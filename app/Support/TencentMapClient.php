<?php
namespace App\Support;


use App\Core\InstanceTrait;
use GuzzleHttp\Client;

class TencentMapClient
{
    use InstanceTrait;

    public $key = 'MU2BZ-I6H3G-IUQQ2-IN5WW-6KR4S-BNBUV';
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://apis.map.qq.com/ws/place/v1/',
            'timeout' => 5.0,
        ]);
    }

    /**
     * @param $city
     * @param $keyword
     * @return mixed
     */
    public function suggestion($city, $keyword)
    {
        $city = urlencode($city);
        $keyword = urlencode($keyword);

        $api = 'suggestion/?region=' . $city . '&keyword=' . $keyword . '&key=' . $this->key;

        $res = $this->client->get($api)->getBody()->getContents();
        return json_decode($res, true);
    }
}