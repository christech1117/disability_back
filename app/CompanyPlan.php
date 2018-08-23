<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPlan extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'plan_id';

    protected $fillable = [
        'plan_name',
        'area_name',
        'area_description',
        'user_id',
        'tel',
        'email',
        'service_start_date',
        'service_end_date',
        'price',
        'description',
        'company_id',
    ];

    protected $dates = ['deleted_at'];
}
