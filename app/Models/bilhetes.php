<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\bilhetes
 *
 * @property int $id
 * @property int $recibo_id
 * @property int $cliente_id
 * @property int $sessao_id
 * @property int $lugar_id
 * @property string $preco_sem_iva
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes query()
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes whereLugarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes wherePrecoSemIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes whereReciboId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes whereSessaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|bilhetes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class bilhetes extends Model
{
    use HasFactory;
	protected $table = "bilhetes"; 
}
