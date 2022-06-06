<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filmes;

/**
 * App\Models\Genero
 *
 * @property string $code
 * @property string $nome
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Genero newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genero newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genero query()
 * @method static \Illuminate\Database\Eloquent\Builder|Genero whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genero whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genero whereNome($value)
 * @mixin \Eloquent
 */
class Genero extends Model{
    use HasFactory;
	protected $table = "generos"; 

	public function filmes()
    {
        return $this->hasMany(Filmes::class);
    }
}
