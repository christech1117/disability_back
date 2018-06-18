<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPlan extends Model
{
    protected $primaryKey = 'plan_id';

    protected $fillable = [
        'plan_name',
        'area_name',
        'user_id',
        'tel',
        'email',
        'service_start_date',
        'service_end_date',
        'price',
        'description',
        'company_id',
        'is_del'
    ];
}
