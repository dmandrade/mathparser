<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file FixMin.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:08
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\FixFunction;

/**
 * Class FixMin
 * @package App\MathParser\Operators\FixFunction
 */
class FixMin extends FixBase
{
    const SYMBOL = 'FixMin';

    /**
     * @var string
     */
    protected $fixType = 'min';
}
