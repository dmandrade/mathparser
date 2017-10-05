<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file Variable.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 04/10/17 at 17:03
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser;

use App\MathParser\Contracts\VariableContract;

/**
 * Class Variable
 * @package App\MathParser
 */
class Variable extends Number implements VariableContract
{

    private $name = '';

    /**
     * @return string
     */
    public function operate()
    {
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
