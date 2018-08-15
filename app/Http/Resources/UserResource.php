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
        $new_datas = [];

        foreach ($datas as $data) {
            $data = [
                'user_id' => $data['id'],
                'username' => $data['username'],
                'avatar' => $data['avatar'],
                'work_start_date' => $data['work_start_date'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'address' => $data['address'],
                // 'depart_id' => $data['depart_id'],
                // 'depart_name' => $data['depart_name'],
                // 'work_title' => $data['work_title'],
                // 'plan_id' => (string)$data['plan_id'],
                // 'plan_name' => $data['plan_name'],
                // 'team_id' => (string)$data['team_id'],
                // 'tema_name' => $data['tema_name']
                'role_id' => (string)$data['role_id'],
                // 'role' => $data['title'],
                // 'approve_status' => $data['approve_status'],
                // 'income' => $data['income'],
                'active' => (string)$data['active']
            ];
            $new_datas[] = $data;
        }

        return array('data' => $new_datas, 'code' => 20000);
    }
}
