<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file FixMin.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 28/08/17 at 17:51
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\FixFunction;

use App\MathParser\Operators\FunctionBase;

/**
 * Class FixMin
 * @package App\MathParser\Operators\FixFunction
 */
class FixMin extends FunctionBase
{
    const SYMBOL = 'FixMin';

    /**
     * @return int
     */
    protected function maxArguments()
    {
        return 3;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    protected function handle(array $parameters)
    {
        $value = $parameters[0];
        $interval = $parameters[1];
        $medida = $parameters[2];

        return FixFunction::calc($value, $interval, $medida, 'min');
    }
}
