<?php

namespace Core\Validation\Rules;


class ValidateRequired extends Rule
{
    public function check()
    {
        return !is_null($this->input);
    }
    function getError()
    {
        return 'Полето трябва е задължително.';
    }
}