<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CiSession
 * 
 * @property string $id
 * @property string $ip_address
 * @property int $timestamp
 * @property string $data
 *
 * @package App\Models
 */
class CiSession extends Model
{
	protected $table = 'ci_sessions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'timestamp' => 'int'
	];

	protected $fillable = [
		'timestamp',
		'data'
	];
}
