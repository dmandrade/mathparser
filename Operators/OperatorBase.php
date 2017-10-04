<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file OperatorBase.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 03/10/17 at 11:07
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators;

use App\MathParser\Contracts\OperatorContract;
use App\MathParser\Expression;

/**
 * Class OperatorBase
 * @package App\MathParser\Operators
 */
abstract class OperatorBase extends Expression implements OperatorContract
{

    /**
     * @var int
     */
    protected $precedence = 0;

    /**
     * @var bool
     */
    protected $leftAssoc = true;

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
    public function isLeftAssoc()
    {
        return $this->leftAssoc;
    }
}
