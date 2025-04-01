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
        $brand = Marca::where('id', '=', $id)->where('status', '=', 1)->first(); // Usar first() en lugar de get()

        if ($brand) {
            $object = [
                'id' => $brand->id,
                'nombre' => $brand->nombre,
            ];
            return response()->json($object);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'No se encontró la marca que buscabas'
            ], 404);
        }
    }

    public function create(Request $request){ // Se debe incluir el tipo Request en el parámetro
        $data = $request->validate([
            'nombre' => 'required',
        ]);

        $brand = Marca::create($data);
        
        if ($brand) {
            return response()->json([
                'code' => 200,
                'message' => 'Se ha creado el elemento con éxito',
                'marca' => $brand
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'No se pudo crear el elemento, favor de verificarlo'
            ], 400); // Código 400 en lugar de 666
        }
    }
}
