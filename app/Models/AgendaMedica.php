<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaMedica extends Model
{
    /**
     * @OA\Schema(
     *     schema="AgendaMedica",
     *     type="object",
     *     title="Agenda Médica",
     *     @OA\Property(property="data", type="string", format="date"),
     *     @OA\Property(property="hora", type="string"),
     *     @OA\Property(property="observacoes", type="string"),
     *     @OA\Property(property="cpf_paciente", type="string"),
     *     @OA\Property(property="tipo_consulta", type="string"),
     *     @OA\Property(property="fk_medico_id", type="integer", format="int64"),
     * )
     */
    protected $table = 'agenda_medica';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'data',
        'hora',
        'observacoes',
        'cpf_paciente',
        'tipo_consulta',
        'fk_medico_id',
    ];


    public function medico()
    {
        return $this->belongsTo(Medico::class, 'fk_medico_id', 'id');
    }
}
