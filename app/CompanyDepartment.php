<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDepartment extends Model
{
    protected $primaryKey = 'depart_id';

    protected $fillable = [
        'sub_company_id',
        'service_type',
        'depart_name',
        'plan_id',
        'user_id',
        'address',
        'tel',
        'live_id',
        'job_id',
        'is_del'
    ];
}
