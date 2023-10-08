<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    /**
     * @OA\Schema(
     *     schema="Prontuario",
     *     type="object",
     *     title="Prontuário",
     *     @OA\Property(property="peso", type="string"),
     *     @OA\Property(property="altura", type="string"),
     *     @OA\Property(property="obs_diagnostico", type="string"),
     *     @OA\Property(property="doencas_cronicas", type="string"),
     *     @OA\Property(property="cirurgias_realizadas", type="string"),
     *     @OA\Property(property="fk_consulta_id", type="integer", format="int64"),
     *     @OA\Property(property="fk_exames_id", type="integer", format="int64"),
     * )
     */

     protected $table = 'prontuario';
     protected $primaryKey = 'id';
     public $timestamps = false;
 
     protected $fillable = [
        'peso',
        'altura',
        'obs_diagnostico',
        'doencas_cronicas',
        'cirurgias_realizadas',
        'fk_consulta_id',
        'fk_exames_id',
     ];
 
 
     public function consulta()
     {
        return $this->hasOne(Consulta::class, 'id', 'fk_consulta_id');
     }
 
     public function exames()
     {
        return $this->hasMany(Exame::class, 'fk_exames_id', 'id');
     }
}
