<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbUnidadeNegocio;
use App\Http\Resources\TbUnidadeNegocioResource;

class TbUnidadeNegocioController extends Controller
{
    /**
    * Listar todas unidades de negocios
    * @authenticated
    *
    */
   public function index()
   {
        $unidade_negocios = TbUnidadeNegocio::paginate(15);
        //return $unidade_negocios;
        //return TbUnidadeNegocioResource::collection($unidade_negocios);
        return response()->json($unidade_negocios);
   }

   /**
    * Mostra uma unidade de negocio específica
    * @authenticated
    *
    */
   public function show($id_uni_neg)
   {
       $unidade_negocio = TbUnidadeNegocio::findOrFail($id_uni_neg);
       //return $unidade_negocio;
       //return new TbUnidadeNegocioResource($unidade_negocio);
       return response()->json($unidade_negocio);
   }
}
