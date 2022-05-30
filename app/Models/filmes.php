<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\filmes
 *
 * @property int $id
 * @property string $titulo
 * @property string $genero_code
 * @property int $ano
 * @property string|null $cartaz_url
 * @property string $sumario
 * @property string|null $trailer_url
 * @property string|null $custom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|filmes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|filmes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|filmes query()
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereAno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereCartazUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereGeneroCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereSumario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereTrailerUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|filmes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class filmes extends Model
{
    use HasFactory;
	protected $table = "filmes"; 
}
