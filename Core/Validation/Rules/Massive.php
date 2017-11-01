<?php

namespace Core\Validation\Rules;


class Massive extends Rule
{

    public function check()
    {

        return is_string($this->input);
    }

    function getError()
    {
        return 'Това не е стринг бе онзи!';
    }
}