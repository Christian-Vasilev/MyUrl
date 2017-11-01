<?php

namespace Core\Validation\Rules;


class ValidateIn extends Rule
{
    public function getError()
    {
        return 'Тва го няма в масива нашия';
    }

    public function check()
    {
        $elements = explode(',', $this->parameter);
        return in_array($this->input, $elements);
    }
}