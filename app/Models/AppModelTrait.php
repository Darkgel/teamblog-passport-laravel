<?php
/**
 * Created by PhpStorm.
 * User: michael.shi
 * Date: 2019/3/27
 * Time: 9:36
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

trait AppModelTrait
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    // Allow for camelCased attribute access
    public function getAttribute($key){
        return parent::getAttribute(snake_case($key));
    }

    public function setAttribute($key, $value){
        return parent::setAttribute(snake_case($key), $value);
    }
}
