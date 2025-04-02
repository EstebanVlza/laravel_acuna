<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function todos(){
        $marcas = Marca::where('status', '=', 1)->get();
        $list = [];

        foreach ($marcas as $brand) {
            $object = [
                'id' => $brand->id,
                'nombre' => $brand->nombre,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function item($id){
        $brand = Marca::where('id', '=', $id)->where('status', '=', 1)->first();

        if ($brand) {
            return response()->json([
                'id' => $brand->id,
                'nombre' => $brand->nombre,
            ]);
        }

        return response()->json([
            'code' => 404,
            'message' => 'No se encontró la marca que buscabas'
        ], 404);
    }

    public function create(Request $request){
        $data = $request->validate([
            'nombre' => 'required',
        ]);

        $brand = Marca::create($data);
        
        if ($brand) {
            return response()->json([
                'code' => 201,
                'message' => 'Se ha creado la marca con éxito',
                'marca' => $brand
            ], 201);
        }

        return response()->json([
            'code' => 400,
            'message' => 'No se pudo crear la marca, favor de verificarlo'
        ], 400);
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'nombre' => 'required',
        ]);

        $brand = Marca::find($id);
        
        if ($brand) {
            $brand->update($data);
            return response()->json([
                'code' => 200,
                'message' => 'Marca actualizada con éxito',
                'marca' => $brand,
            ]);
        }

        return response()->json([
            'code' => 404,
            'message' => 'Marca no encontrada con los datos introducidos',
        ], 404);
    }

    public function delete($id){
        $brand = Marca::find($id);
    
        if (!$brand) {
            return response()->json([
                'code' => 404,
                'message' => 'Marca no encontrada'
            ], 404);
        }
    
        // Cambiar el estado a 0 en lugar de eliminar
        $brand->status = 0;
        
        if ($brand->save()) {
            return response()->json([
                'code' => 200,
                'message' => 'Estado de la marca cambiado con éxito',
                'marca' => [
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
