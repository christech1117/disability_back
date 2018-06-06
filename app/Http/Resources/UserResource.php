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
        $data = array(
            'avatar' => "https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif",
            'code' => '',
            'introduction' => '我是超级管理员',
            'name' => $this->username,
            'role' => array('admin'),
            'status' => '',
            'token' => '',
            'user' => '',
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        );

        return array('data' => $data, 'code' => 20000);
    }
}
