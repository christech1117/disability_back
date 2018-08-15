<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanySubCompany extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'sub_company_name',
        'sub_company_description'
    ];

    protected $dates = ['deleted_at'];
}
