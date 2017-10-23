<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Atan2.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 16:14
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Contracts\ExpressionContract;
use App\MathParser\Operators\FunctionBase;

/**
 * Class Atan2
 * @package App\MathParser\Operators\Arithmetic
 */
class Atan2 extends FunctionBase {
    const SYMBOL = 'Math.atan2';

    /**
     * @var int
     */
    protected $precedence = 8;

    /**
     * @return int
     */
    protected function maxArguments() {
        return 2;
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    protected function handle( array $parameters ) {
        $left  = (float) $parameters[0];
        $right = (float) $parameters[1];

        if ( $left instanceof ExpressionContract ) {
            $left = $left->getValue();
        }

        if ( $right instanceof ExpressionContract ) {
            $right = $right->getValue();
        }

        return atan2( $left, $right );
    }
}
