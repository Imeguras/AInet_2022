<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model{
    use HasFactory, SoftDeletes;
	protected $table = "generos";
    protected $primaryKey = "code";
    public $incrementing = false;

	public function filmes()
    {
        return $this->hasMany(Filmes::class);
    }

}
