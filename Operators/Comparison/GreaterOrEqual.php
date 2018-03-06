<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file GreaterOrEqual.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:08
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Comparison;

use App\MathParser\Operators\OperatorBase;

/**
 * Class GreaterOrEqual
 * @package App\MathParser\Operators\Comparison
 */
class GreaterOrEqual extends OperatorBase
{
    const SYMBOL = '>=';

    /**
     * @var int
     */
    protected $precedence = 2;

    /**
     * @var bool
     */
    protected $leftAssoc = true;

    /**
     * @param $left
     * @param null $right
     *
     * @return int
     */
    public function handle($left, $right = null)
    {
        return (int)($left >= $right);
    }
}
