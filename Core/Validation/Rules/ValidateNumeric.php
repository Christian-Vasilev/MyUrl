<?php

namespace Core\Validation\Rules;


class ValidateNumeric extends Rule
{

    public function check()
    {
        return is_numeric($this->input);
    }

    function getError()
    {
        return 'Полето трябва да е число.';
    }
}