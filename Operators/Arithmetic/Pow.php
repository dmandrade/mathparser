<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Pow.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 15/02/18 at 11:05
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Contracts\ExpressionContract;
use App\MathParser\Operators\FunctionBase;

/**
 * Class Pow
 * @package App\MathParser\Operators\Arithmetic
 */
class Pow extends FunctionBase
{
    const SYMBOL = 'Math.pow';

    /**
     * @var int
     */
    protected $precedence = 8;

    /**
     * @return int
     */
    protected function maxArguments()
    {
        return 2;
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    protected function handle(array $parameters)
    {
        $left = $parameters[0];
        $right = $parameters[1];

        if ($left instanceof ExpressionContract) {
            $left = $left->getValue();
        }

        if ($right instanceof ExpressionContract) {
            $right = $right->getValue();
        }

        return pow($left, $right);
    }
}
