<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Parameter.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 13:27
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Logical;

use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Parameter
 * @package App\MathParser\Operators\Logical
 */
class Parameter extends OperatorBase {

    const SYMBOL = ',';

    /**
     * @var int
     */
    protected $precedence = 1;

    /**
     * @var bool
     */
    protected $returnVarObject = true;

    /**
     * @param Stack $stack
     *
     * @return int
     */
    public function handle( $left, $right = null ) {
        $left  = $this->getValues( $left );
        $right = $this->getValues( $right );

        return array_merge( $left, $right );
    }

    private function getValues( $value ) {
        if ( ! is_array( $value ) ) {
            $value = [ $value ];
        }

        return $value;
    }
}