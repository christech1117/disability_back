<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDepartment extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'depart_id';

    protected $fillable = [
        # 日間服務
        'company_id',
        'sub_company_id',
        'depart_type',
        'service_type',
        'depart_name',
        'plan_id',
        'user_id',
        'address',
        'phone',
        # 居住服務
        'house_type',
        'have_elevator',
        'house_nature',
        'rent',
        'floor',
        'floor_area',
        'parlor_count',
        'bathroom_count',
        'room_count',
        'bed_count',
        # 就業服務
        'work_start_time',
        'work_end_time',
        'salary',
        'content',
    ];

    protected $dates = ['deleted_at'];
}
