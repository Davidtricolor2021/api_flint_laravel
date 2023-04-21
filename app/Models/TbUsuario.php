<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;


/**
 * Class TbUsuario
 * 
 * @property int $id_usuario
 * @property string $nome
 * @property string $email
 * @property string $usuario
 * @property string $senha
 * @property string|null $ip_address
 * @property string|null $activation_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $forgotten_password_code
 * @property int $last_login
 * @property string $active
 * @property int $id_perfil
 * @property int $uni_neg_select
 * @property int $limit_login
 * @property int $is_deleted
 * 
 * @property TbPerfil $tb_perfil
 * @property Collection|TbUsuarioUnidadeNegocio[] $tb_usuario_unidade_negocios
 *
 * @package App\Models
 */
class TbUsuario extends Model
{
	protected $table = 'tb_usuario';
	protected $primaryKey = 'id_usuario';

	protected $casts = [
		'last_login' => 'int',
		'id_perfil' => 'int',
		'uni_neg_select' => 'int',
		'limit_login' => 'int',
		'is_deleted' => 'int'
	];

	protected $fillable = [
		'nome',
		'email',
		'usuario',
		'senha',
		'ip_address',
		'activation_code',
		'forgotten_password_code',
		'last_login',
		'active',
		'id_perfil',
		'uni_neg_select',
		'limit_login',
		'is_deleted'
	];

	public function getAuthPassword()
	{
		return $this->senha;
	}

	public function tb_perfil()
	{
		return $this->belongsTo(TbPerfil::class, 'id_perfil');
	}

	public function tb_usuario_unidade_negocios()
	{
		return $this->hasMany(TbUsuarioUnidadeNegocio::class, 'id_usuario');
	}
}
