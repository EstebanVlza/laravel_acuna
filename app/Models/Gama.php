<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gama extends Model
{
    protected $table = "gama";
    protected $fillable = ['nombre', 'descripcion'];
}