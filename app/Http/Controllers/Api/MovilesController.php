<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movil;
use Illuminate\Http\Request;

class MovilesController extends Controller
{

    public function todos(){
        $moviles = Movil::where('status', '=', 1)->get();
        $list = [];
        
        foreach ($moviles as $mobile) {
            $object = [
                'id'=> $mobile->id,
                'nombre'=> $mobile->nombre,
                'gama_id'=> $mobile->gama_id,
                'marca_id'=> $mobile->marca_id,
                'precio'=> $mobile->precio,
                'almacenamiento'=> $mobile->almacenamiento,
                'ram'=> $mobile->ram,
                'bateria'=> $mobile->bateria,
                'sistema_op'=> $mobile->sistema_op,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }  

    public function item($id){
        $mobile = Movil::where('id', '=', $id)->where('status', '=', 1)->first();

        if ($mobile) {
            $object = [
                'id'=> $mobile->id,
                'nombre'=> $mobile->nombre,
                'gama_id'=> $mobile->gama_id,
                'marca_id'=> $mobile->marca_id,
                'precio'=> $mobile->precio,
                'almacenamiento'=> $mobile->almacenamiento,
                'ram'=> $mobile->ram,
                'bateria'=> $mobile->bateria,
                'sistema_op'=> $mobile->sistema_op,
            ];
            return response()->json($object);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'No se encontró el móvil que buscabas'
            ], 404);
        }
    }  

    public function create(Request $request){
        $data = $request->validate([
            'nombre' => 'required',
            'gama_id' => 'required',
            'marca_id' => 'required',
            'precio' => 'required',
            'almacenamiento' => 'required',
            'ram' => 'required',
            'bateria' => 'required',
            'sistema_op' => 'required',
        ]);

        $mobile = Movil::create($data);

        if ($mobile) {
            return response()->json([
                'code' => 200,
                'message' => 'Se ha creado el elemento con éxito',
                'movil' => $mobile
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'No se pudo crear el elemento, favor de verificarlo'
            ], 400);
        }
    }

}
