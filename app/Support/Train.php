<?php

namespace App\Support;


use App\Core\InstanceTrait;
use App\Src\Model\DistrictTrainModel;
use App\Src\Repository\DistrictTrainRepository;
use Phpml\Classification\KNearestNeighbors;

class Train
{
    use InstanceTrait;

    /** @var KNearestNeighbors */
    public $classifier;

    public function __construct()
    {
        $classifier = new KNearestNeighbors();
        $id = 0;
        while (true) {
            $samples = app(DistrictTrainRepository::class)->findById($id);
            if (count($samples) === 0) {
                break;
            }
            $trans = [];
            $result = [];

            /** @var DistrictTrainModel $item */
            foreach ($samples as $item) {
                $trans[] = [$item->lat, $item->lon];
                $result[] = $item->oid;
                $id = $item->id;
            }
            $classifier->train($trans, $result);
        }

        $this->classifier = $classifier;
    }

    public function __call($name, $arguments)
    {
        return $this->classifier->$name(...$arguments);
    }
}