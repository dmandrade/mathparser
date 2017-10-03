<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Parenthesis.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser;

/**
 * Class Parenthesis
 * @package App\MathParser
 */
class Parenthesis extends Expression
{

    /**
     * @var int
     */
    protected $precedence = 6;

    /**
     * @param Stack $stack
     */
    public function operate(Stack $stack)
    {
    }

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
    public function isNoOp()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isParenthesis()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isOpen()
    {
        return $this->value == '(';
    }

}
