<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'nombre'];
    public function bloques() { return $this->hasMany(Bloque::class, 'proyecto_codigo', 'codigo');}
}
