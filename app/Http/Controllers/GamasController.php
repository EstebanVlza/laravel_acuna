<?php

namespace App\Http\Controllers;

use App\Models\Gama;
use Illuminate\Http\Request;

class GamasController extends Controller
{
public function index(){
    
    $gamas = Gama::where( 'status', '=',1)->get();
    
    return view("gama.index", compact("gamas"));

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

    public function delete(Request $request){
        $data = $request->validate([
            'gama_id' => 'required|integer'
        ], [
            'gama_id.integer' => 'favor de enviar el id unicamente'
        ]);
        $gama = Gama::Where('id','=', $data['gama_id'])->where('status', '=', 1)->first();
        if($gama){
            $gama->status=0;
            $gama->save();
            return redirect()->route('gama')->with('success', 'Se elimino correctamente la gama');
        }else{
            return redirect()->route('gama')->with('error', 'No se encontro una gama con los datos proporcionados. Favor de verificarlo,');
        }
    }
    
}
