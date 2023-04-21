<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbEscalacaoCliente;
use App\Http\Resources\TbEscalacaoClienteResource;
use App\Models\TbPlanos;
use App\Models\TbUnidadeNegocio;
use App\Models\TbUsuario;
use Illuminate\Support\Facades\Auth;

class TbEscalacaoClienteController extends Controller
{
    /**
     * Listar todas escalações clientes
     * @authenticated
     */
    public function index()
    {
        $escalacao_clientes = TbEscalacaoCliente::paginate(15);
        return TbEscalacaoClienteResource::collection($escalacao_clientes);
    }

    /**
     * Mostra uma escalacao cliente específica
     * @authenticated
     */

    public function show($id)
    {
        $escalacao_cliente = TbEscalacaoCliente::findOrFail($id);
        return new TbEscalacaoClienteResource($escalacao_cliente);
    }

    /**
     * Retornar os dados de acordo com o grão do plano contratado pelo cliente/loja
     * @authenticated
     */
    public function retorno_grao(Request $request)
    {
        $data = $request->all();

        $usuarios = TbUsuario::select('id_usuario', 'uni_neg_select')
        ->where('id_usuario', '=', Auth::user()->id_usuario)->get();

        foreach ($usuarios as $usuario) {
            //dd($usuario->uni_neg_select);
            $escalacao_clientes = TbEscalacaoCliente::select('loja')
            ->where('data_escalacao', '=', $data['data'])
            ->where('loja', '=', $usuario->uni_neg_select)->get();

            foreach ($escalacao_clientes as $escalacao_cliente) {
                //dd($escalacao_cliente->loja);
                $uni_neg_planos = TbUnidadeNegocio::select('nome_plano') 
                ->where('id_uni_neg', '=', $escalacao_cliente->loja)->get();

                foreach ($uni_neg_planos as $uni_neg_plano) {
                    //dd($uni_neg_plano->nome_plano);
                    $plano_graos = TbPlanos::select('grao')
                    ->where('nome', '=', $uni_neg_plano->nome_plano)->get();

                    foreach ($plano_graos as $plano_grao) {
                        $data_grao = $plano_grao->grao;
                        //dd($plano_grao->grao);

                        $grao = $data_grao * 60;
                        //dd($grao);
                
                        $data['data'] = $data['data'] ?: date('Y-m-d');
                
                        if ($data['start'] >= "07:00"){
                            $data['start'] = $data['start'];
                        } else {
                            $data['start'] = "07:00";
                        }
                                
                        $escalacao_cliente = TbEscalacaoCliente::select('id','loja','data_escalacao','cliente','horario')
                        ->selectRaw('SUM(qtde_pessoas_entrada) as qtde_pessoas_entrada')
                        //->selectRaw('SUM(qtde_pessoas_grupo_entrada) as qtde_pessoas_grupo_entrada') // comentar na api obx
                        ->selectRaw('SUM(qtde_clientes_individual_entrada) as qtde_clientes_individual_entrada')
                        ->selectRaw('SUM(qtde_clientes_por_grupo_entrada) as qtde_clientes_por_grupo_entrada')
                        ->selectRaw('SUM(qtde_grupo_entrada) as qtde_grupo_entrada')
                        ->selectRaw('SUM(qtde_funcionarios_entrada) as qtde_funcionarios_entrada')
                        ->selectRaw('SUM(entrada) as entrada')  
                        ->where("data_escalacao", "=", $data['data']) 
                        ->where("loja","=", $escalacao_cliente->loja)            
                        ->where("horario",">=" , $data['start'])
                        ->where("horario","<=" , $data['end'])
                        ->groupByRaw("data_escalacao, UNIX_TIMESTAMP(horario) DIV {$grao}")
                        ->get();

                        return TbEscalacaoClienteResource::collection($escalacao_cliente); 
                    } 
                }              
            }
        }
    }
}              