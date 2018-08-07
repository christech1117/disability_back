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
        $data = [
            'company_id' => (string)$this->company_id,
            'company_name' => $this->company_name,
            'user_id' => $this->user_id,
            'username' => $this->username,
            'tel' => $this->tel,
            'email' => $this->email,
            'service_area' => $this->service_area,
            'service_count' => $this->service_count,
            'service_other' => $this->service_other,
            'user_count' => $this->user_count,
            'service_people' => $this->service_people,
            'budget' => $this->budget,
            'live' => $this->live,
            'daytime' => $this->daytime,
            'job' => $this->job,
            'education' => $this->education,
            'other' => $this->other,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        ];

        return array('data' => $data, 'code' => 20000);
    }
}
