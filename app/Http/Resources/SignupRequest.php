<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SignupRequest extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->usr_id,
            'usr_name' => $this->usr_name,
            'usr_phone' => $this->usr_phone,
            'usr_email' => $this->usr_email,
            'usr_gender' => $this->usr_gender,
            'usr_institute_name' => $this->usr_institute_name,
            'usr_cnt_id' => $this->usr_cnt_id,
            'usr_sts_id' => $this->usr_sts_id,
            "usr_dis_id" => $this->usr_dis_id,
            "usr_address" => $this->usr_address,
            "usr_password" => $this->usr_password
        ];
    }
}
