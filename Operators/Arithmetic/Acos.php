<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Acos.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 15:23
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Number;
use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Acos
 * @package App\MathParser\Operators\Arithmetic
 */
class Acos extends OperatorBase {
    const SYMBOL = 'Math.acos';

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
     * @return float
     */
    public function handle( $left, $right = null ) {
        return acos( $left );
    }
}
