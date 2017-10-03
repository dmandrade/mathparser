<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file AndOperator.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Logical;

use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class AndOperator
 * @package App\MathParser\Operators\Logical
 */
class AndOperator extends OperatorBase
{

    const SYMBOL = 'AND';

    /**
     * @var int
     */
    protected $precedence = 1;

    /**
     * @param Stack $stack
     * @return int
     */
    public function operate(Stack $stack)
    {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return (int)($left && $right);
    }

}