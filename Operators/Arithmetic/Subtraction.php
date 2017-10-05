<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Subtraction.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Subtraction
 * @package App\MathParser\Operators\Arithmetic
 */
class Subtraction extends OperatorBase
{

    const SYMBOL = '-';

    /**
     * @var int
     */
    protected $precedence = 4;

    /**
     * @param $left
     * @param null $right
     * @return null
     */
    public function handle($left, $right = null)
    {
        return $left - $right;
    }
}
