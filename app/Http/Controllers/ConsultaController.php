<?php

namespace App\Http\Controllers;

use App\Models\{Consulta, Paciente};
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
     /**
     * @OA\Get(
     *     path="/consulta",
     *     tags={"Consulta"},
     *     summary="Retorna todas as consultas",
     *     description="Retorna todas as consultas",
     *     security={{ "api_token": {} }},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Consulta"))),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function index()
    {
        return response()->json(Consulta::all());
    }

    /**
     * @OA\Post(
     *     path="/consulta",
     *     tags={"Consulta"},
     *     summary="Cadastra nova consulta",
     *     description="Cadastra nova consulta",
     *     security={{ "api_token": {} }},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados da consulta",
     *         @OA\JsonContent(ref="#/components/schemas/Consulta")
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Cadastrado com sucesso.",
     *          @OA\JsonContent(ref="#/components/schemas/Consulta")),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function store(Request $request)
    {
        $consulta = Consulta::create();
        return response()->json($consulta, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/consulta/{id}",
     *     tags={"Consulta"},
     *     summary="Retorna consulta pelo id",
     *     description="Retorna consulta pelo id",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id da consulta",
     *        in="path",
     *        name="id",
     *        example="1",
     *        required=true,
     *        @OA\Schema(
     *           type="integer",
     *           format="int64"
     *        ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Sucesso.",
     *          @OA\JsonContent(ref="#/components/schemas/Consulta")),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function show(string $id)
    {
        return response()->json(Consulta::findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/consulta/{id}",
     *     tags={"Consulta"},
     *     summary="Edita consulta",
     *     description="Edita consulta",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id da consulta",
     *        in="path",
     *        name="id",
     *        example="1",
     *        required=true,
     *        @OA\Schema(
     *           type="integer",
     *           format="int64"
     *        ),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados da consulta a serem atualizados",
     *         @OA\JsonContent(ref="#/components/schemas/Consulta")
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Salvo com sucesso.",
     *          @OA\JsonContent(ref="#/components/schemas/Consulta")),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function update(Request $request, string $id)
    {
        $consulta = Consulta::find($id)->update($request->toArray());
        return response()->json($consulta, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/consulta/paciente/{id}",
     *     tags={"Consulta"},
     *     summary="Recupera as consultas de um paciente",
     *     description="Recupera as consultas de um paciente",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id do paciente",
     *        in="path",
     *        name="id",
     *        example="1",
     *        required=true,
     *        @OA\Schema(
     *           type="integer",
     *           format="int64"
     *        ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Consultas.",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Consulta"))),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function consultasPaciente(string $id) {
        $paciente = Paciente::findOrFail($id);

        return $paciente->consultas()->with('medico')->get();
    }

    /**
     * @OA\Get(
     *     path="/consulta/medico/{id}",
     *     tags={"Consulta"},
     *     summary="Recupera as consultas de um medico",
     *     description="Recupera as consultas de um medico",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id do medico",
     *        in="path",
     *        name="id",
     *        example="1",
     *        required=true,
     *        @OA\Schema(
     *           type="integer",
     *           format="int64"
     *        ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Consultas.",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Consulta"))),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function consultasMedico(string $id) {
        $medico = Medico::findOrFail($id);

        return $medico->consultas()->with('paciente')->get();
    }

    /**
     * @OA\Delete(
     *     path="/consulta/{id}",
     *     tags={"Consulta"},
     *     summary="Apaga registro da consulta",
     *     description="Apaga registro da consulta",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id da consulta",
     *        in="path",
     *        name="id",
     *        example="1",
     *        required=true,
     *        @OA\Schema(
     *           type="integer",
     *           format="int64"
     *        ),
     *     ),
     *     @OA\Response(
     *          response=204,
     *          description="Apagado com sucesso."),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function destroy(string $id)
    {
        Consulta::findOrFail($id)->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
