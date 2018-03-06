<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file ExpressionContract.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:08
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

/**
 * Created by PhpStorm.
 * User: danil
 * Date: 04/10/2017
 * Time: 14:15
 */

namespace App\MathParser\Contracts;

interface ExpressionContract
{

    /**
     * @return string
     */
    public function render();

    /**
     * @return int
     */
    public function getValue();
}
