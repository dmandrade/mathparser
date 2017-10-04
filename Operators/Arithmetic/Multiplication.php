<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Multiplication.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Multiplication
 * @package App\MathParser\Operators\Arithmetic
 */
class Multiplication extends OperatorBase
{
    const SYMBOL = '*';

    /**
     * @var int
     */
    protected $precedence = 5;

    /**
     * @param Stack $stack
     * @return mixed
     */
    public function operate(Stack $stack)
    {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return $left * $right;
    }
}
