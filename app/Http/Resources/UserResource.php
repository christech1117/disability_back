<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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

        foreach ($datas as $data) {
            $data = [
                'user_id' => $data['id'],
                'value' => $data['username'],
                'avatar' => $data['avatar'],
                'work_start_date' => $data['work_start_date'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'adress' => $data['adress'],
                'depart_id' => $data['depart_id'],
                // 'depart_name' => $data['depart_name'],
                'work_title' => $data['work_title'],
                'plan_id' => $data['plan_id'],
                'plan_name' => $data['plan_name'],
                'team_id' => $data['team_id'],
                // 'tema_name' => $data['tema_name']
            ];
            $new_datas[] = $data;
        }


        return array('data' => $new_datas, 'code' => 20000);
    }
}
