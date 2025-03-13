<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamaController extends Controller
{
    public function index(){
        return view("gama");
    }
}
