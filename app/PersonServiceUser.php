<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonServiceUser extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'avatar',
        'birthday',
        'sex',
        'identity',
        'identify_date',
        'publish_date',
    ];


    protected $dates = ['deleted_at'];
}
