<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('inicio'); // busca resources/views/inicio.blade.php
    }
}
