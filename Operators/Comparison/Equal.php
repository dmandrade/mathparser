<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Equal.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 15/02/18 at 11:05
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Comparison;

use App\MathParser\Operators\OperatorBase;

/**
 * Class Equal
 * @package App\MathParser\Operators\Comparison
 */
class Equal extends OperatorBase
{

    const SYMBOL = '==';

    /**
     * @var int
     */
    protected $precedence = 3;

    /**
     * @param $left
     * @param null $right
     *
     * @return int
     */
    public function handle($left, $right = null)
    {
        return (int)($left == $right);
    }
}
