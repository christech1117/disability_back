<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyPlanResource extends JsonResource
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
                'plan_id' => $data['plan_id'],
                'company_id' => $data['company_id'],
                'user_id' => $data['user_id'],
                'value' => $data['plan_name'],
                'area_name' => $data['area_name'],
                'service_start_date' => $data['service_start_date'],
                'service_end_date' => $data['service_end_date'],
                'price' => $data['price'],
                'description' => $data['description'],
                'username' => $data['username'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ];
            $new_datas[] = $data;
        }

        return array('data' => $new_datas, 'code' => 20000);
    }
}
