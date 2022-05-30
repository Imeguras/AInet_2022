<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\configuracao
 *
 * @property int $id
 * @property string $preco_bilhete_sem_iva
 * @property int $percentagem_iva
 * @property string|null $custom
 * @method static \Illuminate\Database\Eloquent\Builder|configuracao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|configuracao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|configuracao query()
 * @method static \Illuminate\Database\Eloquent\Builder|configuracao whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|configuracao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|configuracao wherePercentagemIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|configuracao wherePrecoBilheteSemIva($value)
 * @mixin \Eloquent
 */
class configuracao extends Model
{
    use HasFactory;
	protected $table = "configuracao"; 
}
