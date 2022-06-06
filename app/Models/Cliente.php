<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cliente
 *
 * @property int $id
 * @property string|null $nif
 * @property string|null $tipo_pagamento
 * @property string|null $ref_pagamento
 * @property string|null $custom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereNif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereRefPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereTipoPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cliente whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cliente extends Model
{
    use HasFactory;
	protected $table = "clientes"; 
}
