<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDepartment extends Model
{
    protected $primaryKey = 'depart_id';

    protected $fillable = [
        'company_name',
        'user_id',
        'tel',
        'email',
        'service_area',
        'service_people',
        'budget',
        'live',
        'daytime',
        'job',
        'education',
        'other',
        'is_del'
    ];
}
