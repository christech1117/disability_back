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
            'id' => $this->id,
            'avatar' => "https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif",
            'description' => $this->description,
            'name' => $this->username,
            'roles' => [$this->title],
            'token' => 'admin',
        );

        return array('data' => $data, 'code' => 20000);
    }
}
