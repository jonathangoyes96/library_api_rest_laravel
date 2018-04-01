<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    // Nombre de los parametros que queremos llenar en la base de datos
    protected $fillable = ['nombre', 'resumen', 'npagina','edicion','autor','precio'];
}
