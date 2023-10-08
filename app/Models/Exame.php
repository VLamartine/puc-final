<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    /**
     * @OA\Schema(
     *     schema="Exames",
     *     type="object",
     *     title="Exames",
     *     @OA\Property(property="cod_exame", type="integer", format="int64"),
     *     @OA\Property(property="nome_exame", type="string"),
     *     @OA\Property(property="metodo_realizacao", type="string"),
     *     @OA\Property(property="indicacao", type="string"),
     *     @OA\Property(property="parte_corpo", type="string"),
     * )
     */

     protected $table = 'exames';
     protected $primaryKey = 'id';
     public $timestamps = false;
 
     protected $fillable = [
         'cod_exame',
         'nome_exame',
         'metodo_realizacao',
         'indicacao',
         'parte_corpo',
     ];
 
     public function prontuario()
     {
         return $this->belongsTo(Prontuario::class, 'fk_exames_id', 'id');
     }
}
