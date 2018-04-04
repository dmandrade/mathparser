<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 *  @project NomadLog Portal
 *  @file FunctionBase.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:09
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators;

use App\MathParser\Contracts\OperatorContract;
use App\MathParser\Exceptions\TooManyArgumentsException;
use App\MathParser\Expression;
use App\MathParser\Stack;

/**
 * Class FunctionBase
 * @package App\MathParser\Operators
 */
abstract class FunctionBase extends Expression implements OperatorContract
{

    /**
     * @var int
     */
    protected $precedence = 0;

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
     * @throws TooManyArgumentsException
     */
    public function operate(Stack $stack)
    {
        $parameters = $stack->pop()->operate($stack);
        if (count($parameters) > $this->maxArguments()) {
            throw new TooManyArgumentsException('Max allowed arguments exceeded for ' . static::SYMBOL . ' function');
        }

        return $this->handle($parameters);
    }

    /**
     * @return int
     */
    protected abstract function maxArguments();

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    protected abstract function handle(array $parameters);
}
