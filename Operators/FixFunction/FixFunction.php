<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file FixFunction.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 30/08/17 at 10:24
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\FixFunction;

use App\MathParser\Contracts\VariableContract;
use App\MathParser\Exceptions\FixFunctionException;
use App\Utils\ArrayUtil;

/**
 * Class FixFunction
 * @package App\MathParser\Operators\FixFunction
 */
abstract class FixFunction {
    /**
     * @var array
     */
    private static $valueBuffer = array();
    private static $posX;

    /**
     * @param mixed $value
     * @param mixed $interval
     * @param mixed $medida
     * @param string $type
     *
     * @return float|int|mixed
     */
    static public function calc( $value, $interval = null, $medida = null, $type = 'base' ) {
        $varName = 'base';
        if ( $value instanceof VariableContract ) {
            $varName = $value->getName();
            $value   = $value->getValue();
        }
        if ( $medida instanceof VariableContract ) {
            $medida = $medida->getValue();
        }
        $interval = $interval * $medida;
        $posX     = self::$posX;

        return self::updateValue( $value, $posX, $interval, $type, $varName );
    }

    /**
     * @param $value
     * @param $curPos
     * @param $interval
     * @param $type
     * @param string $varName
     * @return float|int|mixed
     * @throws FixFunctionException
     */
    private static function updateValue( $value, $curPos, $interval, $type, $varName = '' ) {
        $bufferName = $type . '_' . $varName;

        if ( ! isset( self::$valueBuffer[ $bufferName ] ) ) {
            self::$valueBuffer[ $bufferName ] = array();
        }

        self::$valueBuffer[$bufferName][$curPos] = $value;
        self::$valueBuffer[$bufferName] = array_intersect_key(self::$valueBuffer[$bufferName],
            array_flip(array_filter(array_keys(self::$valueBuffer[$bufferName]),
                function ($x) use ($curPos, $interval) {
                    return ($x >= ($curPos - 50000) and $x <= $curPos);
                })));

        $reverse = array_reverse(self::$valueBuffer[$bufferName], true);

        $auxValues = [];

        $isCompleteSliceData = false;
        foreach ($reverse as $posX => $value) {
            if ($posX > 0 and (abs($curPos) - abs($posX)) >= $interval) {
                $isCompleteSliceData = true;
                break;
            }
            $auxValues[] = $value;
        }

        return self::getBufferResult( $type, $auxValues, $isCompleteSliceData );
    }

    /**
     * @param $type
     * @param $auxValues
     * @param $isCompleteSliceData
     * @return float|int|mixed
     * @throws FixFunctionException
     */
    private static function getBufferResult( $type, $auxValues, $isCompleteSliceData ) {
        $result = 0;
        $totalBuffer = count( $auxValues );

        if ( $totalBuffer > 0 && $isCompleteSliceData ) {
            switch ( strtolower( $type ) ) {
                case 'base':
                    $result = end( $auxValues );
                    break;
                case 'max':
                    $result = max( $auxValues );
                    break;
                case 'min':
                    $result = min( $auxValues );
                    break;
                case 'avg':
                    $result = array_sum( $auxValues ) / $totalBuffer;
                    break;
                default:
                    throw new FixFunctionException( 'Invalid fix function ' . $type );
            }
        }

        return $result;
    }

    /**
     * @param array $buffer
     */
    public static function setBuffer( array $buffer ) {
        self::$valueBuffer = $buffer;
    }

    /**
     * @param $posX
     */
    public static function setPosX( $posX ) {
        self::$posX = $posX;
    }
}
