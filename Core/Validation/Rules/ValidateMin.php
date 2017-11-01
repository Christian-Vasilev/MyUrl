<?php

namespace Core\Validation\Rules;


class ValidateMin extends Rule
{

    public function getError()
    {
        if(is_numeric($this->input)) {
            return 'Полето трябва да е по-голямо от '. $this->parameter;
        }
        return 'Полето трябва да е минимум '. $this->parameter. ' знака.';
    }

    public function check()
    {
        if(is_numeric($this->input)) {
            return $this->input >= $this->parameter;
        }
        return strlen($this->input) >= $this->parameter;
    }
}