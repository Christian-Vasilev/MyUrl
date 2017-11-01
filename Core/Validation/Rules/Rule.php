<?php
/**
 * Created by PhpStorm.
 * User: Melomanchetoo
 * Date: 1.11.2017 г.
 * Time: 17:40
 */

namespace Core\Validation\Rules;


abstract class Rule
{
    protected $input;
    protected $parameter;
    public function __construct($input, $parameter)
    {
        $this->input = $input;
        $this->parameter = $parameter;
    }

    abstract function check();
    abstract function getError();

    public function isValid() {
        return $this->check();
    }
}