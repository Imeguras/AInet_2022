<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\users
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $tipo
 * @property int $bloqueado
 * @property string|null $foto_url
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users query()
 * @method static \Illuminate\Database\Eloquent\Builder|users whereBloqueado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereFotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class users extends Model
{
    use HasFactory;
	protected $table = "users"; 
	protected $primaryKey = 'id';
	
	public $timestamps = true;
}
