<?php

namespace App\Http\Controllers;

use App\Models\Gama;
use Illuminate\Http\Request;

class GamaController extends Controller
{
public function index(){
    
    $gama = Gama::all();
    
    return view("gama.index", compact("gama"));

    }
    
    public function item($id){
        $gama = Gama::where('id', '=', $id)->first();

        return view('gama.item', compact('gama'));
    }
}
