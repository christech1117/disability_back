<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonServiceUserResource extends JsonResource
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
                'id' => $data['id'],
                'company_id' => $data['company_id'],
                'name' => $data['name'],
                'birthday' => $data['birthday'],
                'sex' => (string)$data['sex'],
                'identity' => $data['identity'],
                'publish_date' => $data['publish_date'],
                'identify_date' => $data['identify_date'],
                'avatar' => $data['avatar'],
                'obstacle_level' => $data['obstacle_level'],
                'marriage' => (string)$data['marriage'],
                'marriage_memo' => $data['marriage_memo'],
                'house_address' => $data['house_address'],
                'contact_address' => $data['contact_address'],
                'height' => $data['height'],
                'weight' => $data['weight'],
                'blood' => $data['blood'],
                'care_people' => $data['care_people'],
                'decided_people' => $data['decided_people'],
                'education' => $data['education']
            ];
            $new_datas[] = $data;
        }

        return array('data' => $new_datas, 'code' => 20000);
    }
}
