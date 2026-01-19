<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemarqueController extends Controller
{
    public function index()
    {
        return view('remarques'); // Crée resources/views/remarques.blade.php
    }
}
