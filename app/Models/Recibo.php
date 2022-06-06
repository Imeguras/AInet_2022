<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD:app/Models/Recibo.php
class Recibo extends Model
=======
/**
 * App\Models\recibos
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
 * @method static \Illuminate\Database\Eloquent\Builder|recibos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|recibos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|recibos query()
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereNif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereNomeCliente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos wherePrecoTotalComIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos wherePrecoTotalSemIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereReciboPdfUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereRefPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereTipoPagamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|recibos whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class recibos extends Model
>>>>>>> master:app/Models/recibos.php
{
    use HasFactory;
	protected $table = "recibos"; 
}
