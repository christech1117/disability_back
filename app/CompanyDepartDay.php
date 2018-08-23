<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDepartDay extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'service_type',
        'sub_company_id',
        'depart_name',
        'plan_id',
        'user_id',
        'address',
        'phone',
        'live_id',
        'job_id',
    ];

    protected $dates = ['deleted_at'];
}
