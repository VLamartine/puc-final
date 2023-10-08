<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /**
     * @OA\Schema(
     *     schema="Medico",
     *     type="object",
     *     title="Medico",
     *     @OA\Property(property="nome", type="string"),
     *     @OA\Property(property="uf", type="string"),
     *     @OA\Property(property="municipio", type="string"),
     *     @OA\Property(property="crm", type="string"),
     *     @OA\Property(property="fk_usuario_id", type="integer", format="int64"),
     * )
     */
    use HasFactory;
    protected $table = 'medico';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'uf',
        'municipio',
        'crm',
        'fk_usuario_id',
    ];

    public function especialidades()
    {
        return $this->belongsToMany(
            Especialidade::class,
            'medico_especialidade',
            'fk_medico_id',
            'fk_especialidade_id'
        );
    }

    public function agendaMedica()
    {
        return $this->hasMany(AgendaMedica::class, 'fk_medico_id', 'id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'fk_medico_id');
    }
}
