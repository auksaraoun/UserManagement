<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amphur extends Model
{
    protected $primaryKey = 'AMPHUR_ID';
	public  $timestamps = false;
    protected $fillable = [
        'AMPHUR_ID','AMPHUR_NAME','PROVINCE_ID'	,
    ];
}
