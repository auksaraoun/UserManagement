<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	protected $primaryKey = 'PROVINCE_ID';
	public  $timestamps = false;
    protected $fillable = [
        'AMPHUR_ID','AMPHUR_CODE','AMPHUR_NAME', 'POSTCODE','PROVINCE_ID'	,
    ];
}
