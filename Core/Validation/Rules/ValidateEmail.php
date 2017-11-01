<?php

namespace Core\Validation\Rules;


class ValidateEmail extends Rule
{

    public function getError()
    {
        return 'Невалиден мейл адрес.';
    }

    public function check()
    {
        return filter_var($this->input, FILTER_VALIDATE_EMAIL);
    }
}