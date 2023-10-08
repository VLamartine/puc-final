<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Swagger(
 *     schemes={"http", "https"},
 *     @OA\Info(
 *          version="1.0.0",
 *          title="Documentação Microserviço agenda médica",
 *          description="Swagger Microserviço agenda médica",
 *          @OA\Contact(
 *              email="1094820@sga.pucminas.br"
 *          ),
 *          @OA\License(
 *              name="Apache 2.0",
 *              url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *          )
 *     )
 * ),
 *
 * @OA\SecurityScheme(
 *   securityScheme="api_token",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization",
 *   description="Entre com o token beraer no formato **Bearer &lt;token>**",
 * ),
 *
 * @OA\Tag(
 *     name="Agenda",
 *     description="Endpoints para agenda do médico"
 * ),
 *
 * @OA\Tag(
 *     name="Especialidade",
 *     description="Endpoints para especialidades médicas"
 * )
 *
 * @OA\Tag(
 *     name="Medico",
 *     description="Endpoints para dados relacionados aos médicos"
 * )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
