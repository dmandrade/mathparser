<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the NomadLog Portal project.
 *
 *  @project NomadLog Portal
 *  @file Engine.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 06/03/18 at 18:09
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace App\MathParser;

use App\MathParser\Contracts\OperatorContract;
use App\MathParser\Contracts\ParenthesiContract;
use App\MathParser\Exceptions\CannotRenderException;
use App\MathParser\Exceptions\MismatchParenteshisException;
use App\MathParser\Operators\OperatorBase;

/**
 * Class Engine
 * @package App\MathParser
 */
class Engine
{

    /**
     * @var array
     */
    protected $variables = array();

    public function registerVariables(array $vars)
    {
        $this->variables = array_merge($this->variables, $vars);

        return $this;
    }

    /**
     * @param $name
     * @param $value
     *
     * @return $this
     */
    public function registerVariable($name, $value)
    {
        $this->variables[$name] = $value;

        return $this;
    }

    public function getVariable($name, $default = null)
    {
        if (isset($this->variables[$name])) {
            return $this->variables[$name];
        }

        return $default;
    }

    /**
     * @param $string
     *
     * @return string
     */
    public function evaluate($string)
    {
        $stack = $this->parse($string);

        return $this->run($stack);
    }

    /**
     * @param $string
     *
     * @return Stack
     * @throws \Exception
     */
    public function parse($string)
    {
        $tokens = $this->tokenize($string);
        $output = new Stack();
        $operators = new Stack();

        foreach ($tokens as $token) {
            $token = $this->extractVariables($token);

            $expression = Factory::create($token);

            if ($expression instanceof OperatorContract) {
                $this->parseOperator($expression, $output, $operators);
                continue;
            } elseif ($expression instanceof ParenthesiContract) {
                $this->parseParenthesis($expression, $output, $operators);
                continue;
            }

            $output->push($expression);
        }

        // validate parenthesises
        while (!$operators->isEmpty() && ($operator = $operators->pop())) {
            if ($operator instanceof ParenthesiContract) {
                throw new MismatchParenteshisException('Mismatched Parenthesis in ' . $string);
            }
            $output->push($operator);
        }

        return $output;
    }

    /**
     * @param $string
     *
     * @return array
     */
    protected function tokenize($string)
    {
        $parts = preg_split(
            '(([a-zA-Z0-9._]+|\d+\.?\d*+|\+|-|\(|\)|\*|/|\,)|\s+)',
            $string,
            null,
            PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
        );
        $parts = array_map('trim', $parts);
        foreach ($parts as $key => &$value) {
            //if this is the first token or we've already had an operator or open parenthesis, this is unary
            if ($value == '-' && ($key - 1 < 0 || in_array($parts[$key - 1],
                        array('+', '-', '*', '/', '(')))) {
                $value = 'u';
            }
        }

        return $parts;
    }

    /**
     * @param $token
     *
     * @return int|mixed
     */
    protected function extractVariables($token)
    {
        if (isset($this->variables[$token])) {
            $value = $this->variables[$token];
            if (!is_numeric($value)) {
                $value = $this->evaluate($value);
            }
            $var = new Variable($value);
            $var->setName($token);

            return $var;
        }

        return $token;
    }

    /**
     * @param OperatorContract $expression
     * @param Stack $output
     * @param Stack $operators
     */
    protected function parseOperator(OperatorContract $expression, Stack $output, Stack $operators)
    {
        while (!$operators->isEmpty() && ($end = $operators->top()) && $end instanceof OperatorContract) {
            /** @var OperatorBase $end */
            if (!($expression->isLeftAssoc() && $expression->getPrecedence() <= $end->getPrecedence())
                && !(!$expression->isLeftAssoc() && $expression->getPrecedence() < $end->getPrecedence())) {
                break;
            }

            $operator = $operators->isEmpty() ? null : $operators->pop();
            $output->push($operator);
        }

        $operators->push($expression);
    }

    /**
     * @param ParenthesiContract $expression
     * @param Stack $output
     * @param Stack $operators
     *
     * @throws MismatchParenteshisException
     */
    protected function parseParenthesis(ParenthesiContract $expression, Stack $output, Stack $operators)
    {
        if ($expression->isOpen()) {
            $operators->push($expression);

            return;
        }

        $clean = false;
        while (!$operators->isEmpty() && ($end = $operators->pop())) {
            if ($end instanceof ParenthesiContract) {
                $clean = true;
                break;
            }

            $output->push($end);
        }
        if (!$clean) {
            throw new MismatchParenteshisException('Mismatched Parenthesis');
        }
    }

    /**
     * @param Stack $stack
     *
     * @return string
     */
    public function run(Stack $stack)
    {
        while (!$stack->isEmpty() && ($operator = $stack->pop()) && $operator instanceof OperatorContract) {
            $value = $operator->operate($stack);
            //if (!is_null($value)) {
                $stack->push(Factory::create($value));
            //}
        }

        return isset($operator) ? $operator->render() : $this->render($stack);
    }

    /**
     * @param Stack $stack
     *
     * @return string
     * @throws CannotRenderException
     */
    protected function render(Stack $stack)
    {
        $output = '';
        while (!$stack->isEmpty() && ($expression = $stack->pop())) {
            $output .= $expression->render();
        }

        if ($output) {
            return $output;
        }

        throw new CannotRenderException('Cannot render');
    }
}
