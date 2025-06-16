<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'proyecto_codigo'];
    public function proyecto() { return $this->belongsTo(Proyecto::class, 'proyecto_codigo', 'codigo'); }
    public function piezas() { return $this->hasMany(Pieza::class); }
}
