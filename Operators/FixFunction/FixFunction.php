<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 * @project NomadLog Portal
 * @file FixFunction.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 06/03/18 at 18:09
 * @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\FixFunction;

use App\MathParser\Contracts\VariableContract;
use App\MathParser\Exceptions\FixFunctionException;
use App\Utils\ArrayUtil;

/**
 * Class FixFunction
 * @package App\MathParser\Operators\FixFunction
 */
abstract class FixFunction
{
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
     * @throws FixFunctionException
     */
    static public function calc($value, $interval = null, $medida = null, $type = 'base')
    {
        $varName = 'base';
        if ($value instanceof VariableContract) {
            $varName = $value->getName();
            $value = $value->getValue();
        }

        if ($medida instanceof VariableContract) {
            $medida = $medida->getValue();
        }

        $interval = $interval * $medida;
        $bufferName = $type . '_' . $interval . '_' . $varName;

        self::updateBuffer($bufferName, $value, $interval);

        return array_reverse(self::$valueBuffer[$bufferName], true);
    }

    /**
     * @param $value
     * @param $interval
     * @return float|int|mixed
     */
    private static function updateBuffer($bufferName, $value, $interval)
    {

        if (!isset(self::$valueBuffer[$bufferName])) {
            self::$valueBuffer[$bufferName] = array();
        }
        $curPos = self::$posX;

        self::$valueBuffer[$bufferName][$curPos] = $value;
        $fixPosX = ArrayUtil::numeric_sorted_nearest(array_keys(self::$valueBuffer[$bufferName]), ($curPos - $interval));

        self::$valueBuffer[$bufferName] = array_intersect_key(self::$valueBuffer[$bufferName],
            array_flip(array_filter(array_keys(self::$valueBuffer[$bufferName]),
                function ($x) use ($curPos, $interval, $fixPosX) {
                    return ($x >= $fixPosX and $x <= $curPos);
                })));
    }

    /**
     * @param array $buffer
     */
    public static function setBuffer(array $buffer)
    {
        self::$valueBuffer = $buffer;
    }

    /**
     * @param $posX
     */
    public static function setPosX($posX)
    {
        self::$posX = $posX;
    }
}
