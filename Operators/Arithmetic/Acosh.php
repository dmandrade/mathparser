<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Acosh.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:08
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Operators\OperatorBase;

/**
 * Class Acosh
 * @package App\MathParser\Operators\Arithmetic
 */
class Acosh extends OperatorBase
{
    const SYMBOL = 'Math.acosh';

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
        return acosh($left);
    }
}
