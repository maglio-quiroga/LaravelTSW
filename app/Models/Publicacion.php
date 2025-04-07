<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $fillable = [
        'id_noticias',
        'titulo',
        'imagen',
        'descripcion',
    ];

    // Relación: Una publicación pertenece a una noticia
    public function noticia()
    {
        return $this->belongsTo(Noticia::class, 'id_noticias');
    }
}
