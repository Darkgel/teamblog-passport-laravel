<?php

namespace App\Models\DbPassport;

use App\Models\AppModelTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $emailVerifiedAt
 * @property string $password
 * @property string $rememberToken
 * @property \Illuminate\Support\Carbon $updatedAt
 * @property \Illuminate\Support\Carbon $createdAt
 * @property \Illuminate\Support\Carbon $deletedAt
 * @property integer $type
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, AppModelTrait;

    protected $connection = 'db_passport';

    protected $table = 'users';

    const TYPE_USER = 0;//代表具体用户，默认值
    const TYPE_CLIENT = 1;//代表某种client

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'rememberToken',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'emailVerifiedAt' => 'datetime',
    ];

    /**
     * @return static
     */
    public static function getDefaultInstance(){
        $model = new static;

        $model->name = '';
        $model->email = '';
        $model->password = '';
        $model->type = self::TYPE_USER;

        return $model;
    }
}
