<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyBasic extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'company_id'   => (string)$this->company_id,
            'company_name' => $this->company_name,
            'member_name' => $this->name,
            'tel' => $this->tel,
            'email' => $this->email,
            'service_area' => '',
            'service_people' => '',
            'budget' => '',
            'service_content' => '',
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        ];
    }
}
