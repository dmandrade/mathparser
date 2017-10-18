<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file LessThan.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Comparison;

use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class LessThan
 * @package App\MathParser\Operators\Comparison
 */
class LessThan extends OperatorBase {
    const SYMBOL = '<';

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
    public function handle( $left, $right = null ) {
        return (int) ( $left < $right );
    }
}
