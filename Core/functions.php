<?php
if(!function_exists('dd')) {
    function dd($variable) {
        die(var_dump($variable));
    }
}