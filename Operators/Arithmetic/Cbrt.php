<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Cbrt.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 16:15
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Number;
use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Cbrt
 * @package App\MathParser\Operators\Arithmetic
 */
class Cbrt extends OperatorBase
{
    const SYMBOL = 'Math.cbrt';

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
        $newNumber = new Number(pow($next, 1 / 3));
        return $newNumber->operate($stack);
    }
}
