<?php

namespace App\Http\Controllers;


class HelloWorldController extends Controller
{
    public function helloWorld($name)
    {
        return view('world', ['name' => $name]);
    }
}