<?php

namespace App\Models;

use App\Models\Marca;
use App\Models\Gama;
use Illuminate\Database\Eloquent\Model;

class Movil extends Model
{
    protected $table = "moviles";
    protected $fillable = [
        'nombre', 
        'gama_id', 
        'marca_id', 
        'precio', 
        'almacenamiento', 
        'ram', 
        'bateria', 
        'sistema_op',
    ];

    public function gama(){
        return $this->belongsTo(Gama::class);
    }
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
