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
public function agregar(){
    
    return view('movil.agregar');
}

public function store(Request $request){
    $data= $request->validate([
        'nombre'=> 'required',
        'precio' => 'required',
        'almacenamiento'=> 'required',
        'ram'=> 'required',
        'bateria'=> 'required',
        'sistema_op'=> 'required',

    ],[
        'precio.integer' => 'favor de escribir el precio en numeros'
    ]);
    Movil::create([
        'nombre' => $data['nombre'],
        'precio' => $data['precio'],
        'almacenamiento'=> $data['almacenamiento'],
        'ram'=> $data['ram'],
        'bateria'=> $data['bateria'],
        'sistema_op'=> $data['sistema_op']

    ]);
    return redirect()->route('movil');
}

public function modificar($id){
    
    //$movil = Movil::find($id); //error 500
    $movil = Movil::findOrFail($id); //error 404
    //$movil = Movil::where('id', '=', $id)->first();

    return view('movil.agregar', compact('movil'));

}

}

