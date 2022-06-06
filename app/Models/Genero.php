<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filmes;

class Genero extends Model{
    use HasFactory;
	protected $table = "generos"; 

	public function filmes()
    {
        return $this->hasMany(Filmes::class);
    }
}
