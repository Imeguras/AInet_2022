<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bilhete
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
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete whereClienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete whereLugarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete wherePrecoSemIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete whereReciboId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete whereSessaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bilhete whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Bilhete extends Model
{
    use HasFactory;
	protected $table = "bilhetes"; 
    protected $fillable = [
            'recibo_id', 'cliente_id', 'sessao_id', 'lugar_id', 'preco_sem_iva', 'estado'
        ];
    public $incrementing = true;

    public function clientes(){
        return $this->belongsTo(Cliente::class);
    }

    public function sessoes(){
        return $this->belongsTo(Sessao::class);
    }

    public function lugares(){
        return $this->hasMany(Lugar::class);
    }

    public function recibos(){
        return $this->hasMany(Recibo::class);
    }

}
