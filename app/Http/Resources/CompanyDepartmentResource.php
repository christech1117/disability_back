<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyDepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $datas = parent::toArray($request);
        $new_datas = [];

        foreach ($datas as $data) {
            $data = [
                'depart_id' => $data['depart_id'],
                'depart_type' => $data['depart_type'],
                'service_type' => $data['service_type'],
                'value' => $data['depart_name'], // 單位名稱
                'plan_id' => $data['plan_id'],
                'plan_name' => $data['plan_name'],
                'user_id' => $data['user_id'],
                'address' => $data['address'],
                'tel' => $data['tel'],
                'live_id' => $data['live_id'],
                'job_id' => $data['job_id'],
                'username' => $data['username'],
                'user_id' => $data['user_id'],
            ];
            $new_datas[] = $data;
        }

        return array('data' => $new_datas, 'code' => 20000);
    }
}
