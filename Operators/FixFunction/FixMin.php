<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 *  @project NomadLog Portal
 *  @file FixMin.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:09
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\FixFunction;

use App\MathParser\Operators\FixFunctionBase;

/**
 * Class FixMin
 * @package App\MathParser\Operators\FixFunction
 */
class FixMin extends FixFunctionBase
{
    const SYMBOL = 'FixMin';

    /**
     * @param array $buffer
     * @return mixed
     */
    protected function getFixValue(array $buffer)
    {
        return min($buffer);
    }
}
