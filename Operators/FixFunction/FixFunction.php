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

    /**
     * @param mixed $value
     * @param mixed $curPos
     * @param mixed $interval
     * @param string $type
     * @param string $varName
     *
     * @return float|int|mixed
     * @throws FixFunctionException
     */
    private static function updateValue( $value, $curPos, $interval, $type, $varName = '' ) {
        $bufferName = $type . '_' . $varName;

        if ( ! isset( self::$valueBuffer[ $bufferName ] ) ) {
            self::$valueBuffer[ $bufferName ] = array();
        }

        self::$valueBuffer[ $bufferName ][ $curPos ] = $value;
        self::$valueBuffer[ $bufferName ]            = array_intersect_key( self::$valueBuffer[ $bufferName ],
            array_flip( array_filter( array_keys( self::$valueBuffer[ $bufferName ] ),
                function ( $x ) use ( $curPos ) {
                    return ( $x >= ( $curPos - 50000 ) && $x <= $curPos );
                } ) ) );

        $reverse = array_reverse( self::$valueBuffer[ $bufferName ], true );

        $bufferValues = [];

        $isCompleteSliceData = false;
        foreach ( $reverse as $posX => $value ) {
            if ( $posX > 0 && ( abs( $curPos ) - abs( $posX ) ) >= $interval ) {
                $isCompleteSliceData = true;
                break;
            }
            $bufferValues[] = $value;
        }

        return self::getBufferResult( $type, $bufferValues, $isCompleteSliceData );
    }

    /**
     * @param $type
     * @param $bufferValues
     * @param $isCompleteSliceData
     *
     * @return float|int|mixed
     * @throws FixFunctionException
     */
    private static function getBufferResult( $type, $bufferValues, $isCompleteSliceData ) {
        $result = 0;
        if ( count( $bufferValues ) > 0 && $isCompleteSliceData ) {
            switch ( strtolower( $type ) ) {
                case 'base':
                    $result = end( $bufferValues );
                    break;
                case 'max':
                    $result = max( $bufferValues );
                    break;
                case 'min':
                    $result = min( $bufferValues );
                    break;
                case 'avg':
                    $result = array_sum( $bufferValues ) / count( $bufferValues );
                    break;
                default:
                    throw new FixFunctionException( 'Invalid fix function ' . $type );
            }
        }

        return $result;
    }
}
