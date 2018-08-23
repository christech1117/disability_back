<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBasic extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'company_id';

    protected $fillable = [
        'company_name',
        'user_id',
        'phone',
        'email',
        'service_area',
        'service_people',
        'service_other',
        'budget',
        'live',
        'service_content',
        'other',
    ];

    protected $dates = ['deleted_at'];
}
