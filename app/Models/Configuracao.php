<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Configuracao
 *
 * @property int $id
 * @property string $preco_bilhete_sem_iva
 * @property int $percentagem_iva
 * @property string|null $custom
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao query()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao wherePercentagemIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuracao wherePrecoBilheteSemIva($value)
 * @mixin \Eloquent
 */
class Configuracao extends Model
{
    use HasFactory;
	protected $table = "configuracao"; 
}
