<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Atn.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 16:13
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Number;
use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Atan
 * @package App\MathParser\Operators\Arithmetic
 */
class Atan extends OperatorBase
{
    const SYMBOL = 'Math.atan';

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
     * @return float
     */
    public function handle($left, $right = null)
    {
        return atan($left);
    }
}
