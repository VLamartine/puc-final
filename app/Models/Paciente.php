<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /**
     * @OA\Schema(
     *     schema="Paciente",
     *     type="object",
     *     title="Paciente",
     *     @OA\Property(property="nome", type="string"),
     *     @OA\Property(property="cpf", type="string"),
     *     @OA\Property(property="rg", type="string"),
     *     @OA\Property(property="data_nascimento", type="string", format="date"),
     *     @OA\Property(property="estado_civil", type="string"),
     *     @OA\Property(property="fk_prontuario_id", type="integer", format="int64"),
     *     @OA\Property(property="fk_usuario_id", type="integer", format="int64"),
     * )
     */

    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'data_nascimento',
        'estado_civil',
        'fk_prontuario_id',
        'fk_usuario_id',
    ];


    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'fk_paciente_id');
    }
}
