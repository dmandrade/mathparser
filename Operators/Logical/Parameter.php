<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Parameter.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 03/10/17 at 13:27
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Logical;

use App\MathParser\Operators\OperatorBase;
use App\MathParser\Stack;

/**
 * Class Parameter
 * @package App\MathParser\Operators\Logical
 */
class Parameter extends OperatorBase
{

    const SYMBOL = ',';

    /**
     * @var int
     */
    protected $precedence = 1;

    /**
     * @param Stack $stack
     * @return int
     */
    public function operate(Stack $stack)
    {
        $left = $this->getValues($stack->pop()->operate($stack));
        $right = $this->getValues($stack->pop()->operate($stack));
        return array_merge($right, $left);
    }

    private function getValues($value)
    {
        if(!is_array($value)){
            $value = [$value];
        }

        return $value;
    }
}
