<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/15
 * Time: 下午4:58
 */

namespace App\Src\Service;


use App\Core\InstanceTrait;
use App\Src\Model\DistrictTrainModel;
use App\Src\Model\PoiDistrictModel;
use App\Src\Repository\PoiDistrictRepository;
use App\Support\TencentMapClient;

class PoiDistrictService
{
    use InstanceTrait;

    public function crawl()
    {
        $res = app(PoiDistrictRepository::class)->findByLevel(3);
        /** @var PoiDistrictModel $item */
        foreach ($res as $item) {
            $rid = $item->oid;
            dump($rid);
            $children = $item->children()->get();
            /** @var DistrictTrainModel $child */
            foreach ($children as $child) {
                try {
                    $res = TencentMapClient::getInstance()->suggestion($item->area_name, $child->area_name);
                } catch (\Exception $ex) {
                    dump($item->area_name . $child->area_name);
                    sleep(2);
                    $res = TencentMapClient::getInstance()->suggestion($item->area_name, $child->area_name);
                }

                if (!isset($res['data'])) {
                    dump($res);
                }
                foreach ($res['data'] ?? [] as $v) {
                    $lat = $v['location']['lat'];
                    $lon = $v['location']['lng'];

                    try {
                        $data = [];
                        $data['lat'] = $lat;
                        $data['lon'] = $lon;
                        $data['oid'] = $child->oid;
                        DistrictService::getInstance()->setDistrict($data);
                    } catch (\Exception $ex) {
                        dump($ex->getMessage());
                    }
                }

                sleep(1);
            }
        }
    }

}