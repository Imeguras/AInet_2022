<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\generos
 *
 * @property string $code
 * @property string $nome
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|generos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|generos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|generos query()
 * @method static \Illuminate\Database\Eloquent\Builder|generos whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|generos whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|generos whereNome($value)
 * @mixin \Eloquent
 */
class generos extends Model
{
    use HasFactory;
	protected $table = "generos"; 
}
