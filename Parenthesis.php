<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 *  @project NomadLog Portal
 *  @file Parenthesis.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:09
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser;

use App\MathParser\Contracts\ParenthesiContract;

/**
 * Class Parenthesis
 * @package App\MathParser
 */
class Parenthesis extends Expression implements ParenthesiContract
{
    /**
     * @return bool
     */
    public function isOpen()
    {
        return $this->value == '(';
    }
}
