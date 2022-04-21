<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    // Campos que se agregarán
    protected $fillable = [
        'titulo',
        'preparacion',
        'ingredientes',
        'imagen',
        'categoria_id',
    ];

    // Obtiene la categoría de la receta desde la FK
    public function categoria(){
        return $this->belongsTo(CategoriasReceta::class, 'categoria_id');
    }

    // Obtiene el autor de la receta desde la FK
    public function autor(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
