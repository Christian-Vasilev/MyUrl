<?php

namespace Core\Validation\Rules;


class ValidateArray extends Rule
{

    public function check()
    {

        return is_array($this->input);
    }

    function getError()
    {
        return 'Полето трябва да е масив.';
    }
}