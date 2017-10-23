<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file FixMax.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 28/08/17 at 17:51
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\FixFunction;

/**
 * Class FixMax
 * @package App\MathParser\Operators\FixFunction
 */
class FixMax extends FixBase {
    const SYMBOL = 'FixMax';

    /**
     * @var string
     */
    protected $fixType = 'max';
}