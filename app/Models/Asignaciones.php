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
        'estado'
    ];



    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarios_id');
    }
    public function cursos()
    {
        return $this->belongsTo(Curso::class, 'cursos_id');
    }

    public function tareas()
    {
        return $this->hasMany(Tareas::class, 'tarea_id');
    }
}
