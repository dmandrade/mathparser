<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Atanh.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 15/02/18 at 11:05
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Operators\OperatorBase;

/**
 * Class Atanh
 * @package App\MathParser\Operators\Arithmetic
 */
class Atanh extends OperatorBase
{
    const SYMBOL = 'Math.atanh';

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
     *
     * @return float|int
     */
    public function handle($left, $right = null)
    {
        return atanh($left);
    }
}
