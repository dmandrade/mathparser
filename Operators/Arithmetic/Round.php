<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Round.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 16:27
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Number;
use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Round
 * @package App\MathParser\Operators\Arithmetic
 */
class Round extends OperatorBase
{
    const SYMBOL = 'Math.round';

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
        return round($left, 0, PHP_ROUND_HALF_DOWN);
    }
}
