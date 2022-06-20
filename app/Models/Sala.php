<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Sala
 *
 * @property int $id
 * @property string $nome
 * @property string|null $custom
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sala newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sala newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sala query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sala whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sala whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sala whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sala whereNome($value)
 * @mixin \Eloquent
 */

class Sala extends Model
{
    use HasFactory, SoftDeletes;
	protected $table = "salas"; 

    public function lugares(){
        return $this->hasMany(Lugar::class);
    }

    public function sessoes(){
        return $this->hasMany(Sala::class);
    }
}
