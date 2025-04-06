<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $table = 'noticias';

    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
    ];

    // Relación: Una noticia puede tener muchas publicaciones
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'id_noticias');
    }
}

