<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 *  @project NomadLog Portal
 *  @file Stack.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:09
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

/**
 * Created by PhpStorm.
 * User: danil
 * Date: 03/10/2017
 * Time: 13:18
 */

namespace App\MathParser;

use App\MathParser\Contracts\ExpressionContract;
use App\MathParser\Contracts\NumberContract;
use App\MathParser\Contracts\VariableContract;

class Stack extends \SplStack
{

    /**
     * @return NumberContract|ExpressionContract|VariableContract
     */
    public function pop()
    {
        return parent::pop();
    }

    /**
     * @return NumberContract|ExpressionContract|VariableContract
     */
    public function top()
    {
        return parent::top();
    }

    public function push($value)
    {
        parent::push($value);
    }
}
