<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lugar
 *
 * @property int $id
 * @property int $sala_id
 * @property string $fila
 * @property int $posicao
 * @property string|null $custom
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar whereFila($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar wherePosicao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lugar whereSalaId($value)
 * @mixin \Eloquent
 */
class Lugar extends Model{
    use HasFactory;
	protected $table = "lugares"; 
}
