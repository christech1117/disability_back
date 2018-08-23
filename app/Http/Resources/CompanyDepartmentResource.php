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
                # 日間服務
                'sub_company_id' => $data['sub_company_id'],
                'sub_company_name' => $data['sub_company_name'],
                'depart_id' => $data['depart_id'],
                'depart_type' => $data['depart_type'],
                'service_type' => $data['service_type'],
                'depart_name' => $data['depart_name'],
                'plan_id' => $data['plan_id'],
                'user_id' => $data['user_id'],
                'username' => $data['username'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                # 居住服務
                'house_type' => $data['house_type'],
                'have_elevator' => (string) $data['have_elevator'],
                'house_nature' => $data['house_nature'],
                'rent' => $data['rent'],
                'floor' => $data['floor'],
                'floor_area' => $data['floor_area'],
                'parlor_count' => $data['parlor_count'],
                'bathroom_count' => $data['bathroom_count'],
                'room_count' => $data['room_count'],
                'bed_count' => $data['bed_count'],
                # 就業服務
                'work_start_time' => $data['work_start_time'],
                'work_end_time' => $data['work_end_time'],
                'salary' => (string) $data['salary'],
                'content' => $data['content'],
            ];
            $new_datas[] = $data;
        }

        return array('data' => $new_datas, 'code' => 20000);
    }
}
