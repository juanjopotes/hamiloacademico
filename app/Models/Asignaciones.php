<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignaciones extends Model
{
    use HasFactory;
    protected $table = 'asignaciones';

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'usuarios_id',
        'cursos_id',
    ];



    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
