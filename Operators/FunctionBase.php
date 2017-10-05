<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file FunctionBase.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 04/10/17 at 17:03
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
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
abstract class FunctionBase extends OperatorBase implements OperatorContract
{
    /**
     * @return int
     */
    protected abstract function maxArguments();

    /**
     * @param array $parameters
     * @return mixed
     */
    protected abstract function handle(array $parameters);

    /**
     * @param Stack $stack
     * @return mixed
     * @throws TooManyArgumentsException
     */
    public function operate(Stack $stack)
    {
        $parameters = $stack->pop()->operate($stack);
        if(count($parameters) > $this->maxArguments())
        {
            throw new TooManyArgumentsException('Max allowed arguments exceeded for ' . static::SYMBOL . ' function');
        }
        return $this->handle($parameters);
    }
}
