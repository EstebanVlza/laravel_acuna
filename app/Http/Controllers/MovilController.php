<?php

namespace App\Http\Controllers;

use App\Models\Movil;
use Illuminate\Http\Request;

class MovilController extends Controller
{
public function index() {

    $movil = Movil::where('ram', '>', '8')->get(); 

    return view("movil.index", compact("movil"));

}

public function item($id){
    $movil = Movil::where('id', '=', $id)->first();

    return view('movil.item', compact('movil'));
}

}

