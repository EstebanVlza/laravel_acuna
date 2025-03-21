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
        return redirect()->route('marca')->with('message', 'Marca registrada con exito');
    }

        public function update(Request $request){
        $data= $request->validate([
            'id'=>'integer|required',
            'nombre'=> 'required'
        ],[
            'nombre.varchar' => 'favor de escribir el nombre con letras',
        ]);
        $marca = Marca::where('id','=', $data['id'])->first();

        if($marca){
            $marca->nombre = $data['nombre'];
            $marca->save();
        
        return redirect()->route('marca');
    }else{
        return redirect()->route('marca');

    }
}

    public function modificar($id){
        $marca = Marca::where('id', '=', $id)->first();
        return view('marca.agregar', compact('marca'));
    }

}
