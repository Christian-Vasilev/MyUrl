<?php

namespace Core\Validation\Rules;


class ValidateMax extends Rule
{

    public function getError()
    {
        if(is_numeric($this->input)) {
            return 'Полето трябва да е по-малко от '. $this->parameter;
        }
        return 'Полето трябва да е не повече '. $this->parameter. ' знака.';
    }

    public function check()
    {
        if(is_numeric($this->input)) {
            return $this->input <= $this->parameter;
        }
        return strlen($this->input) <= $this->parameter;
    }
}