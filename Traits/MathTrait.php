<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 *  @project NomadLog Portal
 *  @file MathTrait.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 09/10/17 at 15:05
 *  @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

/**
 * Created by PhpStorm.
 * User: danil
 * Date: 09/10/2017
 * Time: 15:05
 */

namespace App\MathParser\Traits;


use App\MathParser\Engine;

trait MathTrait
{
    /**
     * @var Engine|null
     */
    private $mathParser = null;

    /**
     * @return Engine|null
     */
    public function math()
    {
        if(is_null($this->mathParser)) {
            $this->mathParser = new Engine();
        }

        return $this->mathParser;
    }
}
