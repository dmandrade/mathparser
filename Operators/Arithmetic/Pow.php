<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Pow.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 16:27
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\Arithmetic;

use App\MathParser\Operators\FunctionBase;

/**
 * Class Pow
 * @package App\MathParser\Operators\Arithmetic
 */
class Pow extends FunctionBase
{
    const SYMBOL = 'Math.pow';

    /**
     * @var int
     */
    protected $precedence = 8;

    /**
     * @return int
     */
    protected function maxArguments()
    {
        return 2;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    protected function handle(array $parameters)
    {
        return call_user_func_array('pow', $parameters);
    }
}
