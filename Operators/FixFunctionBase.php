<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 *  @project NomadLog Portal
 *  @file FixFunctionBase.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 08/05/18 at 17:20
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators;

use App\MathParser\Contracts\OperatorContract;
use App\MathParser\Exceptions\FixFunctionException;
use App\MathParser\Exceptions\TooManyArgumentsException;
use App\MathParser\Expression;
use App\MathParser\Operators\FixFunction\FixFunction;
use App\MathParser\Stack;

/**
 * Class FixFunctionBase
 * @package App\MathParser\Operators
 */
abstract class FixFunctionBase extends FunctionBase
{

    /**
     * @param array $parameters
     *
     * @return mixed
     * @throws FixFunctionException
     */
    protected function handle(array $parameters)
    {
        $value = $parameters[0];
        $interval = $parameters[1];
        $medida = $parameters[2];

        return $this->getFixValue(FixFunction::calc($value, $interval, $medida, static::SYMBOL));
    }

    /**
     * @param array $buffer
     * @return mixed
     */
    abstract protected function getFixValue(array $buffer);

    /**
     * @return int
     */
    protected function maxArguments()
    {
        return 3;
    }
}
