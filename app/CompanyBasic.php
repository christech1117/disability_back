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
    ];

    protected $dates = ['deleted_at'];
}
