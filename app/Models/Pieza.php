<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'peso_teorico', 'peso_real', 'estado', 'bloque_id', 'fecha_registro', 'user_id'];
    public function bloque() { return $this->belongsTo(Bloque::class); }
    public function usuario() { return $this->belongsTo(User::class, 'user_id'); }
}
