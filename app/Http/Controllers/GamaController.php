<?php

namespace App\Http\Controllers;

use App\Models\Gama;
use Illuminate\Http\Request;

class GamaController extends Controller
{
public function index(){
    
    $gama = Gama::all();
    
    return view("gama.index", compact("gama"));

    }
    public function agregar(){
    
        return view('gama.agregar');
    }
    
    public function item($id){
        $gama = Gama::where('id', '=', $id)->first();

        return view('gama.item', compact('gama'));
    }
    public function store(Request $request){
        $data= $request->validate([
            'nombre'=> 'required',
            'descripcion' => 'required',

        ]);
        Gama::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion']
        ]);
        return redirect()->route('gama');
    }

    public function modificar($id){
    
        $gama = Gama::where('id', '=', $id)->first();
    
        return view('gama.agregar', compact('gama'));
    
    }
    
}
