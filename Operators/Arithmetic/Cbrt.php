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
     * @var bool
     */
    protected $onlyOneArgument = true;

    /**
     * @param $left
     * @param null $right
     * @return number
     */
    public function handle($left, $right = null)
    {
        return pow($left, 1 / 3);
    }
}
