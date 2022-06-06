<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Recibo
 *
 * @property int $id
 * @property int $cliente_id
 * @property string $data
 * @property string $preco_total_sem_iva
 * @property string $iva
 * @property string $preco_total_com_iva
 * @property string|null $nif
 * @property string $nome_cliente
 * @property string $tipo_pagamento
 * @property string $ref_pagamento
 * @property string|null $recibo_pdf_url
 * @property string|null $custom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereNif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereNomeCliente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo wherePrecoTotalComIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo wherePrecoTotalSemIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereReciboPdfUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereRefPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereTipoPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recibo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Recibo extends Model
{
    use HasFactory;
	protected $table = "recibos"; 
}
