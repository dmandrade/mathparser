<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Ceil.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 03/10/17 at 16:21
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Number;
use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Ceil
 * @package App\MathParser\Operators\Arithmetic
 */
class Ceil extends OperatorBase
{
    const SYMBOL = 'Math.ceil';

    /**
     * @var int
     */
    protected $precedence = 8;

    /**
     * @param Stack $stack
     * @return mixed
     */
    public function operate(Stack $stack)
    {
        //the operate here should always be returning a value alone
        $next = $stack->pop()->operate($stack);
        //create new number
        $newNumber = new Number(ceil($next));
        return $newNumber->operate($stack);
    }

}