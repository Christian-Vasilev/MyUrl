<?php

namespace MyUrl\Controllers;


class ItemsController extends Controller
{
    public function index($id, $user)
    {
       return str_replace('{id}', $id, file_get_contents('./test.html'));
    }
}