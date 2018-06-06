<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyBasicResource extends JsonResource
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
            'company_id'   => (string)$this->company_id,
            'company_name' => $this->company_name,
            'username' => $this->username,
            'tel' => $this->tel,
            'email' => $this->email,
            'service_area' => $this->service_area,
            'service_people' => '',
            'budget' => $this->budget,
            'service_content' => '',
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        );

        return array('data' => $data, 'code' => 20000);
    }
}
