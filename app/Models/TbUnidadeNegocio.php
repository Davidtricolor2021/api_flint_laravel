<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TbUnidadeNegocio
 * 
 * @property int $id_uni_neg
 * @property int $id_grupo_regiao
 * @property string $uni_neg
 * @property string $cep
 * @property string $rua
 * @property string|null $complemento
 * @property string|null $numero
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $telefone
 * @property string $email
 * @property Carbon $horario_abertura
 * @property Carbon $horario_fechamento
 * @property bool $unid_neg_operacao
 * @property string|null $horario_funcionamento
 * @property int|null $refeicao_a_partir_de
 * 
 * @property TbGrupoRegiao $tb_grupo_regiao
 * @property Collection|TbDefinicaoEntrada[] $tb_definicao_entradas
 * @property Collection|TbDefinicaoSaida[] $tb_definicao_saidas
 * @property Collection|TbFluxoChegadaCaixa[] $tb_fluxo_chegada_caixas
 * @property Collection|TbFluxoChegadaLocalTrabalho[] $tb_fluxo_chegada_local_trabalhos
 * @property TbFluxoEntradaMedio $tb_fluxo_entrada_medio
 * @property TbNumeroEntrada $tb_numero_entrada
 * @property TbNumeroSaida $tb_numero_saida
 * @property Collection|TbUnidadeNegocioTelefone[] $tb_unidade_negocio_telefones
 * @property Collection|TbUsuarioUnidadeNegocio[] $tb_usuario_unidade_negocios
 *
 * @package App\Models
 */
class TbUnidadeNegocio extends Model
{
	protected $table = 'tb_unidade_negocio';
	protected $primaryKey = 'id_uni_neg';
	public $timestamps = false;

	protected $casts = [
		'id_grupo_regiao' => 'int',
		'unid_neg_operacao' => 'bool',
		'refeicao_a_partir_de' => 'int'
	];

	protected $dates = [
		'horario_abertura',
		'horario_fechamento'
	];

	protected $fillable = [
		'id_grupo_regiao',
		'uni_neg',
		'cep',
		'rua',
		'complemento',
		'numero',
		'bairro',
		'cidade',
		'estado',
		'telefone',
		'email',
		'horario_abertura',
		'horario_fechamento',
		'unid_neg_operacao',
		'horario_funcionamento',
		'refeicao_a_partir_de'
	];

	public function tb_grupo_regiao()
	{
		return $this->belongsTo(TbGrupoRegiao::class, 'id_grupo_regiao');
	}

	public function tb_definicao_entradas()
	{
		return $this->hasMany(TbDefinicaoEntrada::class, 'id_uni_neg');
	}

	public function tb_definicao_saidas()
	{
		return $this->hasMany(TbDefinicaoSaida::class, 'id_uni_neg');
	}

	public function tb_fluxo_chegada_caixas()
	{
		return $this->hasMany(TbFluxoChegadaCaixa::class, 'id_uni_neg');
	}

	public function tb_fluxo_chegada_local_trabalhos()
	{
		return $this->hasMany(TbFluxoChegadaLocalTrabalho::class, 'id_uni_neg');
	}

	public function tb_fluxo_entrada_medio()
	{
		return $this->hasOne(TbFluxoEntradaMedio::class, 'id_uni_neg');
	}

	public function tb_numero_entrada()
	{
		return $this->hasOne(TbNumeroEntrada::class, 'id_uni_neg');
	}

	public function tb_numero_saida()
	{
		return $this->hasOne(TbNumeroSaida::class, 'id_uni_neg');
	}

	public function tb_unidade_negocio_telefones()
	{
		return $this->hasMany(TbUnidadeNegocioTelefone::class, 'id_uni_neg');
	}

	public function tb_usuario_unidade_negocios()
	{
		return $this->hasMany(TbUsuarioUnidadeNegocio::class, 'id_uni_neg');
	}
}
