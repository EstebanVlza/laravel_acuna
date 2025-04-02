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
            return response()->json($mobile);
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

    public function update($id, Request $request){
        $mobile = Movil::find($id);

        if (!$mobile) {
            return response()->json([
                'code' => 404,
                'message' => 'Móvil no encontrado'
            ], 404);
        }

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

        $mobile->update($data);

        return response()->json([
            'code' => 200,
            'message' => 'Móvil actualizado con éxito',
            'movil' => $mobile
        ]);
    }

    public function delete($id){
        $mobile = Movil::find($id);
    
        if (!$mobile) {
            return response()->json([
                'code' => 404,
                'message' => 'Móvil no encontrado'
            ], 404);
        }
    
        // Cambiar el estado a 0 en lugar de eliminar
        $mobile->status = 0;
        
        if ($mobile->save()) {
            return response()->json([
                'code' => 200,
                'message' => 'Estado del móvil cambiado con éxito',
                'movil' => [
                    'id' => $id,
                    'status' => 0
                ]
            ]);
        }
    
        return response()->json([
            'code' => 500,
            'message' => 'No se pudo actualizar el estado, intenta nuevamente.'
        ], 500);
    }
    
}
