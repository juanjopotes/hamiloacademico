<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tareas extends Model
{
    use HasFactory;

    protected $table = 'tareas';

    protected $fillable = [

        'asignacion_id',
        'descripcion',
        'entrega',
        'nota',
    ];

    /**
     * Get the asignaciones that owns the tareas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asignaciones()
    {
        return $this->belongsTo(Asignaciones::class, 'asignacion_id');
    }
}
