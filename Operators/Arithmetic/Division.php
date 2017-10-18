<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Division.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Division
 * @package App\MathParser\Operators\Arithmetic
 */
class Division extends OperatorBase {
    const SYMBOL = '/';

    /**
     * @var int
     */
    protected $precedence = 5;

    /**
     * @param $left
     * @param null $right
     *
     * @return float|int
     */
    public function handle( $left, $right = null ) {
        if ( $right == 0 ) {
            return 0;
        }

        return $left / $right;
    }
}
