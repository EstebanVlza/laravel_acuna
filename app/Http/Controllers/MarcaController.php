<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){
        $marcas = Marca::all();
        return view("marca.index", compact("marcas"));
    }

    public function item($id){
        $marca = Marca::where('id', '=', $id)->first();

        return view('marca.item', compact('marca'));

    }


}
