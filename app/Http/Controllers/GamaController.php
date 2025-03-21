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
            'descripcion' => 'required'

        ], [
            'nombre'=> 'favor de escribir el nombre con letras',
        ]);
        Gama::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion']
        ]);
        return redirect()->route('gama')->with('message', 'Gama registrada con exito');
    }

    public function update(Request $request){
        $data= $request->validate([
            'id'=> 'integer|required',
            'nombre'=> 'required',
            'descripcion'=> 'required'

        ],[
            'nombre.varchar' => 'favor de escribir el nombre con letra',
        ]);
        $gama = Gama::Where('id', '=', $data['id'])->first();

        if($gama){

            $gama->nombre = $data['nombre'];
            $gama->descripcion = $data['descripcion']; 
            $gama->save();   

        return redirect()->route('gama');


    } else{
        return redirect()->route('gama');
    }
}

    


    public function modificar($id){
    
        $gama = Gama::where('id', '=', $id)->first();
    
        return view('gama.agregar', compact('gama'));
    
    }
    
}
