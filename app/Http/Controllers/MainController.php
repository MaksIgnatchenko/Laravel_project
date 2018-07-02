<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class MainController
{
 public function index()
 {
     if (Auth::user()) {
         return redirect('/main');
     } else {
         return redirect()->route('home');
     }
 }
}