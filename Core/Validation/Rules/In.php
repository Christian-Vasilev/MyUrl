<?php
/**
 * Created by PhpStorm.
 * User: Melomanchetoo
 * Date: 1.11.2017 г.
 * Time: 19:09
 */

namespace Core\Validation\Rules;


class In extends Rule
{
    public function getError()
    {
        echo 'Тва го няма в масива нашия';
    }

    public function check()
    {

        $elements = explode(',', $this->parameter);
        if(in_array($this->input, $elements)) {
            return 'ok';
        }
       return 'not ok';
    }
}