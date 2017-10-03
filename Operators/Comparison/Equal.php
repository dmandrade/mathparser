<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Equal.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Comparison;

use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Equal
 * @package App\MathParser\Operators\Comparison
 */
class Equal extends OperatorBase
{

    const SYMBOL = '==';

    /**
     * @var int
     */
    protected $precedence = 3;

    /**
     * @param Stack $stack
     * @return int
     */
    public function operate(Stack $stack)
    {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return (int)($left == $right);
    }
}
