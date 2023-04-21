<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbPlanos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'grao',
        'n_request',
    ];
}
