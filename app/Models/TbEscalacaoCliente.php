<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbEscalacaoCliente
 * 
 * @property int $id
 * @property string|null $cliente
 * @property string|null $loja
 * @property int $camera_id
 * @property Carbon|null $data_escalacao
 * @property Carbon|null $horario
 * @property int|null $qtde_operadores_escalados
 * @property int|null $qtde_pessoas_entrada
 * @property int|null $qtde_pessoas_saida
 * @property int $qtde_pessoas_grupo_entrada
 * @property int $qtde_pessoas_grupo_saida
 * @property int|null $qtde_funcionarios_entrada
 * @property int|null $qtde_funcionarios_saida
 * @property int|null $entrada
 * @property int|null $saida
 * @property int|null $total_clientes_compradores_entrada
 * @property int $clientes_compradores_caixa
 * @property int $clientes_atendidos_caixa
 * @property int|null $media_clientes_compradores_caixa
 * @property int|null $qtde_caixas
 *
 * @package App\Models
 */
class TbEscalacaoCliente extends Model
{
	protected $table = 'tb_escalacao_cliente';
	public $timestamps = false;

	protected $casts = [
		'camera_id' => 'int',
		'qtde_operadores_escalados' => 'int',
		'qtde_pessoas_entrada' => 'int',
		'qtde_pessoas_saida' => 'int',
		'qtde_pessoas_grupo_entrada' => 'int',
		'qtde_pessoas_grupo_saida' => 'int',
		'qtde_funcionarios_entrada' => 'int',
		'qtde_funcionarios_saida' => 'int',
		'entrada' => 'int',
		'saida' => 'int',
		'total_clientes_compradores_entrada' => 'int',
		'clientes_compradores_caixa' => 'int',
		'clientes_atendidos_caixa' => 'int',
		'media_clientes_compradores_caixa' => 'int',
		'qtde_caixas' => 'int'
	];

	protected $dates = [
		//'data_escalacao',
		//'horario'
	];

	protected $fillable = [
		'cliente',
		'loja',
		'camera_id',
		'data_escalacao',
		'horario',
		'qtde_operadores_escalados',
		'qtde_pessoas_entrada',
		'qtde_pessoas_saida',
		'qtde_pessoas_grupo_entrada',
		'qtde_pessoas_grupo_saida',
		'qtde_funcionarios_entrada',
		'qtde_funcionarios_saida',
		'entrada',
		'saida',
		'total_clientes_compradores_entrada',
		'clientes_compradores_caixa',
		'clientes_atendidos_caixa',
		'media_clientes_compradores_caixa',
		'qtde_caixas'
	];
}
