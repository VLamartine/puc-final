<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadeAtendimento extends Model
{
    /**
     * @OA\Schema(
     *     schema="UnidadeAtendimento",
     *     type="object",
     *     title="Prontuário",
     *     @OA\Property(property="nome", type="string"),
     *     @OA\Property(property="endereco", type="string"),
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
