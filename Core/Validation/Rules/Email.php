<?php

namespace Core\Validation\Rules;


class Email extends Rule
{

    public function getError()
    {
        return 'Невалиден мейл адрес.';
    }

    public function check()
    {
        return strpos($this->input, '@') !== FALSE;
    }
}