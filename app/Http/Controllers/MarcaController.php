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
    public function agregar(){
    
        return view('marca.agregar');
    }
    
    public function store(Request $request){
        $data= $request->validate([
            'nombre'=> 'required'
        ]);
        Marca::create([
            'nombre' => $data['nombre'],
        ]);
        return redirect()->route('marca');
    }

}
