<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbUsuario;
use App\Http\Resources\TbUsuarioResource;
use App\Http\Requests\TbUsuarioFormRequest;
use Illuminate\Support\Facades\Hash;

class TbUsuarioController extends Controller
{
      /**
     * Listar todos os usuários
     * @authenticated
     *
     */
    public function index()
    {
        $usuarios = TbUsuario::paginate(15);
        return TbUsuarioResource::collection($usuarios);
    }

    /**
     * Cadastra um novo usuário
     * @authenticated
     *
     */
    public function store(TbUsuarioFormRequest $request)
    {
        $usuario = new TbUsuario();
        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->usuario = $request->input('usuario');
        $usuario->senha = Hash::make($request->senha);
        $usuario->ip_address = $request->input('ip_address');
        $usuario->activation_code = $request->input('activation_code');
        $usuario->forgotten_password_code = $request->input('forgotten_password_code');
        $usuario->last_login = $request->input('last_login');
        $usuario->active = $request->input('active');
        $usuario->id_perfil = $request->input('id_perfil');
        $usuario->uni_neg_select = $request->input('uni_neg_select');
        //$usuario->limit_login = $request->input('limit_login');
        $usuario->is_deleted = $request->input('is_deleted');

        if ($usuario->save()) {
            return new TbUsuarioResource($usuario);
        }
    }

    /**
     * Mostra um usuário específico
     * @authenticated
     *
     */
    public function show($id_usuario)
    {
        $usuario = TbUsuario::findOrFail($id_usuario);
        return new TbUsuarioResource($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_usuario)
    {
        //
    }

    /**
     * Edita uma usuário
     * @authenticated
     *
     */
    public function update(TbUsuarioFormRequest $request, $id_usuario)
    {
        $usuario = TbUsuario::findOrFail($id_usuario);
        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->usuario = $request->input('usuario');
        $usuario->senha = Hash::make($request->senha);;
        $usuario->ip_address = $request->input('ip_address');
        $usuario->activation_code = $request->input('activation_code');
        $usuario->forgotten_password_code = $request->input('forgotten_password_code');
        $usuario->last_login = $request->input('last_login');
        $usuario->active = $request->input('active');
        $usuario->id_perfil = $request->input('id_perfil');
        $usuario->uni_neg_select = $request->input('uni_neg_select');
        //$usuario->limit_login = $request->input('limit_login');
        $usuario->is_deleted = $request->input('is_deleted');

        if ($usuario->save()) {
            return new TbUsuarioResource($usuario);
        }
    }

    /**
     * Deleta uma usuario
     * @authenticated
     *
     */
    public function destroy($id_usuario)
    {
        $usuario = TbUsuario::findOrFail($id_usuario);

        if ($usuario->delete()) {
            return response()->json([
                'message' => 'usuario deletado com sucesso!',
                'data' => new TbUsuarioResource($usuario)
            ]);
        }
    }
}
