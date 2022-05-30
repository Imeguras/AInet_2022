<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\clientes
 *
 * @property int $id
 * @property string|null $nif
 * @property string|null $tipo_pagamento
 * @property string|null $ref_pagamento
 * @property string|null $custom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|clientes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|clientes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|clientes query()
 * @method static \Illuminate\Database\Eloquent\Builder|clientes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clientes whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clientes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clientes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clientes whereNif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clientes whereRefPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clientes whereTipoPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clientes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class clientes extends Model
{
    use HasFactory;
	protected $table = "clientes"; 
}
