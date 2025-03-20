<?php

namespace App\Http\Controllers;

use App\Models\Movil;
use Illuminate\Http\Request;

class MovilController extends Controller
{
public function index() {

    $movil = Movil::where('ram', '>', '3')->get(); 

    return view("movil.index", compact("movil"));

}

public function item($id){
    $movil = Movil::where('id', '=', $id)->first();

    return view('movil.item', compact('movil'));
}
public function agregar(){
    
    return view('movil.agregar');
}

public function store(Request $request){
    $data= $request->validate([
        'nombre'=> 'required',
        'gama_id'=> 'required',
        'marca_id'=> 'required',
        'precio' => 'required',
        'almacenamiento'=> 'required',
        'ram'=> 'required',
        'bateria'=> 'required',
        'sistema_op'=> 'required',

    ],[
        'gama_id.integer' => 'favor de escribir el precio en numeros',
        'marca_id.integer' => 'favor de escribir el precio en numeros',
        'precio.integer' => 'favor de escribir el precio en numeros'
    ]);
    Movil::create([
        'nombre' => $data['nombre'],
        'gama_id' => $data['gama_id'],
        'marca_id' => $data['marca_id'],
        'precio' => $data['precio'],
        'almacenamiento'=> $data['almacenamiento'],
        'ram'=> $data['ram'],
        'bateria'=> $data['bateria'],
        'sistema_op'=> $data['sistema_op']

    ]);
    return redirect()->route('movil')->with('message', 'Movil registrado con exito');
}

public function update(Request $request){
    $data= $request->validate([
        'id' => 'integer|required',
        'nombre'=> 'required',
        'gama_id'=> 'required',
        'marca_id'=> 'required',
        'precio' => 'required',
        'almacenamiento'=> 'required',
        'ram'=> 'required',
        'bateria'=> 'required',
        'sistema_op'=> 'required',

    ],[
        'gama_id.integer' => 'favor de escribir el precio en numeros',
        'marca_id.integer' => 'favor de escribir el precio en numeros',
        'precio.integer' => 'favor de escribir el precio en numeros'
    ]);
    $movil = Movil::Where('id', '=', $data['id'])->first();
    
    if($movil){
      
        $movil->nombre = $data['nombre'];
        $movil->gama_id = $data['gama_id'];
        $movil->marca_id = $data['marca_id'];
        $movil->precio = $data['precio'];
        $movil->almacenamiento= $data['almacenamiento'];
        $movil->ram= $data['ram'];
        $movil->bateria= $data['bateria'];
        $movil->sistema_op= $data['sistema_op'];
        $movil->save();
    
        
        return redirect()->route('movil');

     } else{
        return redirect()->route('movil');
     }
}


public function modificar($id){
    
    //$movil = Movil::find($id); //error 500
    //$movil = Movil::findOrFail($id); //error 404
    $movil = Movil::where('id', '=', $id)->first();

    return view('movil.agregar', compact('movil'));

}


}

