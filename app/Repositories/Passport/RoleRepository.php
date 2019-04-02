<?php
/**
 * Created by PhpStorm.
 * User: michael.shi
 * Date: 2019/4/2
 * Time: 15:53
 */

namespace App\Repositories\Passport;


use App\Models\DbPassport\Role;
use App\Repositories\AppRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleRepository extends AppRepository
{
    public function save($roleData) {
        if(empty($roleData['id']) || intval($roleData['id']) < 1){// 新建role
            $model = Role::getDefaultInstance();
        } else {
            $model = Role::find(intval($roleData['id']));
        }

        if(!empty($roleData['id'])) unset($roleData['id']);
        $model->fill($roleData);

        return ($model->save()) ? $model : null;
    }

    /**
     * @param int $pageNum
     * @param int $pageSize
     *
     * @return LengthAwarePaginator
     */
    public function getRoles($pageNum, $pageSize){
        $models = Role::orderBy('created_at', 'desc')
            ->paginate($pageSize, ['*'], 'pageNum', $pageNum);

        return $models;
    }
}
