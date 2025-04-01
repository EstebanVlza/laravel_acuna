<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gama;
use Illuminate\Http\Request;

class GamasController extends Controller
{
    public function todos(){
        $Gamas = Gama::where('status', '=', 1)->get();
        $list = [];
        
        foreach ($Gamas as $lineup) {
            $object = [
                'id' => $lineup->id,
                'nombre' => $lineup->nombre,
                'descripcion' => $lineup->descripcion,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function item($id){
        $lineup = Gama::where('id', '=', $id)->where('status', '=', 1)->first(); // Usar first() en vez de get()

        if ($lineup) {
            $object = [
                'id' => $lineup->id,
                'nombre' => $lineup->nombre,
                'descripcion' => $lineup->descripcion
            ];
            return response()->json($object);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'No se encontró la gama que buscabas'
            ], 404);
        }
    }

    public function create(Request $request){
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);

        $lineup = Gama::create($data);
        
        if ($lineup) {
            return response()->json([
                'code' => 200,
                'message' => 'Se ha creado el elemento con éxito',
                'gama' => $lineup
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'No se pudo crear el elemento, favor de verificarlo'
            ], 400);
        }
    }
}
