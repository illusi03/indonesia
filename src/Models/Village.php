<?php

namespace Laravolt\Indonesia\Models;

class Village extends Model
{
    protected $table = 'villages';

    protected $casts = [
        'meta' => 'array',
    ];

    protected $appends = [
        'province_name',
        'city_name',
        'disctrict_name',
    ];

    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\District', 'district_code', 'code');
    }

    public function getDistrictNameAttribute()
    {
        return $this->district->name;
    }

    public function getCityNameAttribute()
    {
        return $this->district->city->name;
    }

    public function getProvinceNameAttribute()
    {
        return $this->district->city->province->name;
    }
}
