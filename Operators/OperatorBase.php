<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file OperatorBase.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 15/02/18 at 11:04
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators;

use App\MathParser\Contracts\ExpressionContract;
use App\MathParser\Contracts\OperatorContract;
use App\MathParser\Expression;
use App\MathParser\Stack;

/**
 * Class OperatorBase
 * @package App\MathParser\Operators
 */
abstract class OperatorBase extends Expression implements OperatorContract
{

    /**
     * @var int
     */
    protected $precedence = 0;

    /**
     * @var bool
     */
    protected $onlyOneArgument = false;

    /**
     * @var bool
     */
    protected $returnVarObject = false;

    /**
     * @var bool
     */
    protected $leftAssoc = true;

    /**
     * @return int
     */
    public function getPrecedence()
    {
        return $this->precedence;
    }

    /**
     * @return bool
     */
    public function isLeftAssoc()
    {
        return $this->leftAssoc;
    }

    /**
     * @param Stack $stack
     *
     * @return mixed
     */
    public function operate(Stack $stack)
    {
        $right = null;
        $first = $stack->pop()->operate($stack);

        if (!$this->returnVarObject && $first instanceof ExpressionContract) {
            $first = $first->getValue();
        }

        $left = $first;

        if (!$this->onlyOneArgument) {
            $second = $stack->pop()->operate($stack);
            if (!$this->returnVarObject && $second instanceof ExpressionContract) {
                $second = $second->getValue();
            }
            $right = $left;
            $left = $second;
        }

        return $this->handle($left, $right);
    }

    /**
     * @param $left
     * @param null $right
     *
     * @return mixed
     */
    protected abstract function handle($left, $right = null);
}
