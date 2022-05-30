<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\salas
 *
 * @property int $id
 * @property string $nome
 * @property string|null $custom
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|salas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|salas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|salas query()
 * @method static \Illuminate\Database\Eloquent\Builder|salas whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salas whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|salas whereNome($value)
 * @mixin \Eloquent
 */
class salas extends Model
{
    use HasFactory;
	protected $table = "salas"; 
}
