<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 *  @project NomadLog Portal
 *  @file Addition.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:09
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Operators\OperatorBase;

/**
 * Class Addition
 * @package App\MathParser\Operators\Arithmetic
 */
class Addition extends OperatorBase
{
    const SYMBOL = '+';

    /**
     * @var int
     */
    protected $precedence = 4;

    /**
     * @param $left
     * @param null $right
     *
     * @return mixed
     */
    public function handle($left, $right = null)
    {
        return $left + $right;
    }
}
