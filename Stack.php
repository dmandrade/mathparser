<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file Stack.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 13:18
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

/**
 * Created by PhpStorm.
 * User: danil
 * Date: 03/10/2017
 * Time: 13:18
 */

namespace App\MathParser;


class Stack
{
    protected $data = array();

    public function isEmpty()
    {
        return empty($this->data);
    }

    public function push($element)
    {
        $this->data[] = $element;
    }

    /**
     * @return Expression
     */
    public function pop()
    {
        return array_pop($this->data);
    }

    /**
     * @return Expression
     */
    public function top()
    {
        return current(array_slice($this->data, -1));
    }

}
