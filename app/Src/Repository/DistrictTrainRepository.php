<?php

namespace App\Src\Repository;

use App\Src\Model\DistrictTrainModel;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class DistrictTrainRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DistrictTrainModel::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 保存数据
     * @param $data
     * @return mixed
     */
    public function setDistrict($data)
    {
        $lat = array_get($data, 'lat');
        $lon = array_get($data, 'lon');
        $oid = array_get($data, 'oid');
        $model = DistrictTrainModel::create([
            'lat' => $lat,
            'lon' => $lon,
            'oid' => $oid,
        ]);
        return $model;
    }

    /**
     * @param int $id
     * @param int $limit
     * @return mixed
     */
    public function findById($id = 0, $limit = 100)
    {
        return $this->model->where('id', '>', $id)->offset(0)->take($limit)->get();
    }
}