<?php
/**
 *  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the android project.
 *
 * @project NomadLog Portal
 * @file FixBase.php
 * @author Danilo Andrade <danilo@webbingbrasil.com.br>
 * @date 28/08/17 at 17:50
 * @copyright  Copyright (c) 2017 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser\Operators\FixFunction;

use App\MathParser\Operators\FunctionBase;

/**
 * Class FixBase
 * @package App\MathParser\Operators\FixFunction
 */
class FixBase extends FunctionBase {
    const SYMBOL = 'FixBase';

    protected $fixType = 'base';

    /**
     * @return int
     */
    protected function maxArguments() {
        return 3;
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    protected function handle( array $parameters ) {
        $value    = $parameters[0];
        $interval = $parameters[1];
        $medida   = $parameters[2];

        return FixFunction::calc( $value, $interval, $medida, $this->fixType );
    }
}
