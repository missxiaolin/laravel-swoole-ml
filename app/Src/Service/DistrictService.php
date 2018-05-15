<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/15
 * Time: 下午4:58
 */

namespace App\Src\Service;


use App\Core\InstanceTrait;
use App\Src\Repository\DistrictTrainRepository;

class DistrictService
{
    use InstanceTrait;

    /**
     * @param $data
     * @return mixed
     */
    public function setDistrict($data)
    {
        return app(DistrictTrainRepository::class)->setDistrict($data);
    }

}