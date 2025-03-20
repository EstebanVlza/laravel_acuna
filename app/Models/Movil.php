<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movil extends Model
{
    protected $table = "movil";
    protected $fillable = ['nombre', 'gama_id', 'marca_id', 'precio', 'almacenamiento', 'ram', 'bateria', 'sistema_op'];
}
