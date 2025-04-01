<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function index(){
        $marcas = Marca::where('status', '=',true)->get();
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

    public function delete(Request $request){
        $data = $request->validate([
            'marca_id' => 'required|integer'
        ], [
            'marca_id.integer' => 'favor de enviar el id unicamente'
        ]);
        $marca = Marca::Where('id','=', $data['marca_id'])->where('status', '=', 1)->first();
        if($marca){
            $marca->status=0;
            $marca->save();
            return redirect()->route('marca')->with('success', 'Se elimino correctamente el dispositivo movil');
        }else{
            return redirect()->route('marca')->with('error', 'No se encontro un dispositivo movil con los datos proporcionados. Favor de verificarlo,');
        }
    }

}
