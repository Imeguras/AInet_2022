<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;
	protected $table = 'sessoes';

	public function filme(){
		return $this->belongsTo(Filme::class);
	} 

    public function bilhetes(){
        return $this->hasMany(Bilhete::class);
    }

    public function sala(){
        return $this->belongsTo(Sala::class);
    }

    public function lugares(){
        return $this->hasManyThrough(Lugar::class, Sala::class,
            'id',
            'sala_id',
            'sala_id',
            'id');
    }
}
