<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\sessoes
 *
 * @property int $id
 * @property int $filme_id
 * @property int $sala_id
 * @property string $data
 * @property string $horario_inicio
 * @property string|null $custom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes query()
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes whereFilmeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes whereHorarioInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes whereSalaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sessoes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class sessoes extends Model
{
    use HasFactory;
	protected $table = 'sessoes'; 
}
