<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file OrOperator.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 15/02/18 at 11:05
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Logical;

use App\MathParser\Operators\OperatorBase;

/**
 * Class OrOperator
 * @package App\MathParser\Operators\Logical
 */
class OrOperator extends OperatorBase
{

    const SYMBOL = 'OR';

    /**
     * @var int
     */
    protected $precedence = 1;

    /**
     * @param $left
     * @param null $right
     *
     * @return int
     */
    public function handle($left, $right = null)
    {
        return (int)($left || $right);
    }
}
