<?php
// app/Models/PreguntaFrecuente.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaFrecuente extends Model
{
    use HasFactory;

    protected $table = 'preguntas_frecuentes';  // Asegúrate de que el nombre de la tabla esté bien

    protected $fillable = [
        'titulo', 'texto',
    ];
}


