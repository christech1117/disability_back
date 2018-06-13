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
                'avatar' => "https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif",
                'value' => $data['username'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ];
            $new_datas[] = $data;
        }
        

        return array('data' => $new_datas, 'code' => 20000);
    }
}
