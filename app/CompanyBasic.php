<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyBasic extends Model
{
    protected $primaryKey = 'company_id';

    protected $fillable = [
        'company_name',
        'member_id'
    ];
}
