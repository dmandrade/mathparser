<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Number.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser;

/**
 * Class Number
 * @package App\MathParser
 */
class Number extends Expression
{

    /**
     * @param Stack $stack
     * @return string
     */
    public function operate(Stack $stack)
    {
        return $this->value;
    }

}
