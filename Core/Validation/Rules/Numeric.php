<?php

namespace Core\Validation\Rules;


class Numeric extends Rule
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