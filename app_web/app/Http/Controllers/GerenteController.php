<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerenteController extends Controller
{
    public function index()
    {
        return view('gerente.index'); // Asumiendo que tienes una vista en resources/views/gerente/index.blade.php
    }
}
