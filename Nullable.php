<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 *  @project NomadLog Portal
 *  @file Null.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 04/04/18 at 14:57
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser;

use App\MathParser\Contracts\ExpressionContract;
use App\MathParser\Contracts\NullContract;

/**
 * Class Nullable
 * @package App\MathParser
 */
class Nullable extends Expression implements NullContract, ExpressionContract
{

    /**
     * @return string
     */
    public function operate()
    {
        return $this->value;
    }
}
