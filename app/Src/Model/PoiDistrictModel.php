<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/6
 * Time: 下午12:52
 */

namespace App\Src\Model;

use Illuminate\Database\Eloquent\Model;


class PoiDistrictModel extends Model
{
    protected $table = 'poi_districts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'oid', 'area_name', 'level', 'parent_oid', 'province_oid', 'city_oid', '', 'county_oid', 'area_code', 'simple_name', 'lon', 'lat', 'zip_code', 'whole_name', 'whole_oid', 'pre_pin_yin', 'pin_yin', 'simple_py', 'remark', 'version',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}