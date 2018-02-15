<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Factory.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 15/02/18 at 11:04
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser;

use App\MathParser\Contracts\ExpressionContract;
use App\MathParser\Contracts\VariableContract;

/**
 * Class Factory
 * @package App\MathParser
 */
final class Factory
{

    protected static $operators = [
        'App\\MathParser\\Operators\\Logical\\AndOperator',
        'App\\MathParser\\Operators\\Logical\\OrOperator',
        'App\\MathParser\\Operators\\Logical\\Parameter',
        'App\\MathParser\\Operators\\Comparison\\GreaterThan',
        'App\\MathParser\\Operators\\Comparison\\GreaterOrEqual',
        'App\\MathParser\\Operators\\Comparison\\LessOrEqual',
        'App\\MathParser\\Operators\\Comparison\\LessThan',
        'App\\MathParser\\Operators\\Comparison\\Equal',
        'App\\MathParser\\Operators\\Comparison\\NotEqual',
        'App\\MathParser\\Operators\\Arithmetic\\Unary',
        'App\\MathParser\\Operators\\Arithmetic\\Addition',
        'App\\MathParser\\Operators\\Arithmetic\\Subtraction',
        'App\\MathParser\\Operators\\Arithmetic\\Multiplication',
        'App\\MathParser\\Operators\\Arithmetic\\Division',
        'App\\MathParser\\Operators\\Arithmetic\\Modulus',
        'App\\MathParser\\Operators\\Arithmetic\\Power',
        'App\\MathParser\\Operators\\Arithmetic\\Abs',
        'App\\MathParser\\Operators\\Arithmetic\\Acos',
        'App\\MathParser\\Operators\\Arithmetic\\Acosh',
        'App\\MathParser\\Operators\\Arithmetic\\Asin',
        'App\\MathParser\\Operators\\Arithmetic\\Asinh',
        'App\\MathParser\\Operators\\Arithmetic\\Atan',
        'App\\MathParser\\Operators\\Arithmetic\\Atanh',
        'App\\MathParser\\Operators\\Arithmetic\\Atan2',
        'App\\MathParser\\Operators\\Arithmetic\\Cbrt',
        'App\\MathParser\\Operators\\Arithmetic\\Ceil',
        'App\\MathParser\\Operators\\Arithmetic\\Cos',
        'App\\MathParser\\Operators\\Arithmetic\\Cosh',
        'App\\MathParser\\Operators\\Arithmetic\\Exp',
        'App\\MathParser\\Operators\\Arithmetic\\Floor',
        'App\\MathParser\\Operators\\Arithmetic\\Log',
        'App\\MathParser\\Operators\\Arithmetic\\Pow',
        'App\\MathParser\\Operators\\Arithmetic\\Round',
        'App\\MathParser\\Operators\\Arithmetic\\Sin',
        'App\\MathParser\\Operators\\Arithmetic\\Sinh',
        'App\\MathParser\\Operators\\Arithmetic\\Sqrt',
        'App\\MathParser\\Operators\\Arithmetic\\Tan',
        'App\\MathParser\\Operators\\Arithmetic\\Tanh',
        'App\\MathParser\\Operators\\FixFunction\\FixBase',
        'App\\MathParser\\Operators\\FixFunction\\FixMax',
        'App\\MathParser\\Operators\\FixFunction\\FixMin',
        'App\\MathParser\\Operators\\FixFunction\\FixAvg',
    ];

    public static function create($value)
    {

        if ($value instanceof ExpressionContract) {
            return $value;
        }

        if ($value instanceof VariableContract) {
            return $value;
        }

        if (is_numeric($value)) {
            $expression = new Number($value);
        }

        if (in_array($value, array('(', ')'))) {
            $expression = new Parenthesis($value);
        }

        if (!isset($expression)) {
            foreach (self::$operators as $operator) {
                if ($operator::SYMBOL == $value) {
                    $expression = new $operator($value);
                }
            }

            if (!isset($expression)) {
                throw new \InvalidArgumentException('Undefined Value ' . $value);
            }
        }

        return $expression;
    }
}
