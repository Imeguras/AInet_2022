<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Filme
 *
 * @property int $id
 * @property int $filme_id
 * @property int $sala_id
 * @property string $data
 * @property string $horario_inicio
 * @property string|null $custom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Filme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Filme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Filme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereFilmeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereHorarioInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereSalaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $titulo
 * @property string $genero_code
 * @property int $ano
 * @property string|null $cartaz_url
 * @property string $sumario
 * @property string|null $trailer_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sessao[] $sessoes
 * @property-read int|null $sessoes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereAno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereCartazUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereGeneroCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereSumario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Filme whereTrailerUrl($value)
 */
class Filme extends Model
{
    use HasFactory;
	protected $table = "filmes"; 

	public function sessoes(){
		return $this->hasMany(Sessao::class);
	}
}
