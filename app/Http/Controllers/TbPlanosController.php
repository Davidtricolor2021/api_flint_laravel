<?php

namespace App\Http\Controllers;

use App\Http\Resources\TbPlanosResource;
use App\Models\TbPlanos;
use Illuminate\Http\Request;

class TbPlanosController extends Controller
{
      /**
     * Listar todos os planos
     * @authenticated
     */
    public function index()
    {
        $planos = TbPlanos::paginate(15);
        return TbPlanosResource::collection($planos);
    }

    /**
     * Cadastra um novo plano
     * @authenticated
     */
    public function store(Request $request)
    {
        $plano = new TbPlanos();
        $plano->nome = $request->input('nome');
        $plano->grao = $request->input('grao');
        $plano->n_request = $request->input('n_request');

        if ($plano->save()) {
            return new TbPlanosResource($plano);
        }
    }

    /**
     * Mostra um plano específico
     * @authenticated
     */
    public function show($id)
    {
        $plano = TbPlanos::findOrFail($id);
        return new TbPlanosResource($plano);
    }

    /**
     * Edita uma plano
     * @authenticated
     */
    public function update(Request $request, $id)
    {
        $plano = TbPlanos::findOrFail($id);
        $plano->nome = $request->input('nome');
        $plano->grao = $request->input('grao');
        $plano->n_request = $request->input('n_request');

        if ($plano->save()) {
            return new TbPlanosResource($plano);
        }
    }

    /**
     * Deleta um plano especifico
     * @authenticated
     */
    public function destroy($id)
    {
        $plano = TbPlanos::findOrFail($id);

        if ($plano->delete()) {
            return response()->json([
                'message' => 'plano deletado com sucesso!',
                'data' => new TbPlanosResource($plano)
            ]);
        }
    }
}
