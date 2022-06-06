<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sessao
 *
 * @property int $id
 * @property int $filme_id
 * @property int $sala_id
 * @property string $data
 * @property string $horario_inicio
 * @property string|null $custom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Filme $filme
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao whereFilmeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao whereHorarioInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao whereSalaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sessao whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sessao extends Model
{
    use HasFactory;
	protected $table = 'sessoes';

	public function filme(){
		return $this->belongsTo(Filme::class);
	} 
}
