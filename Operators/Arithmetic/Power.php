<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Power.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 15/02/18 at 11:05
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Operators\OperatorBase;

/**
 * Class Power
 * @package App\MathParser\Operators\Arithmetic
 */
class Power extends OperatorBase
{
    const SYMBOL = '^';

    /**
     * @var int
     */
    protected $precedence = 6;

    /**
     * @param $left
     * @param null $right
     *
     * @return number
     */
    public function handle($left, $right = null)
    {
        return pow($left, $right);
    }
}
