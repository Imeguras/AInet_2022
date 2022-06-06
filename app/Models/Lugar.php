<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD:app/Models/Lugar.php
class Lugar extends Model
=======
/**
 * App\Models\lugares
 *
 * @property int $id
 * @property int $sala_id
 * @property string $fila
 * @property int $posicao
 * @property string|null $custom
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|lugares newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|lugares newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|lugares query()
 * @method static \Illuminate\Database\Eloquent\Builder|lugares whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|lugares whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|lugares whereFila($value)
 * @method static \Illuminate\Database\Eloquent\Builder|lugares whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|lugares wherePosicao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|lugares whereSalaId($value)
 * @mixin \Eloquent
 */
class lugares extends Model
>>>>>>> master:app/Models/lugares.php
{
    use HasFactory;
	protected $table = "lugares"; 
}
