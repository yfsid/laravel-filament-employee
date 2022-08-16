<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'address' => $this->address,
            'countryID' => $this->country_id,
            'countryName' => $this->country->name,
            'cityID' => $this->city_id,
            'cityName' => $this->city->name,
            'departmentID' => $this->department_id,
            'departmentName' => $this->department->name,
            'zipCode' => $this->zip_code,
            'birthDate' => $this->birth_date,
            'hiredDate' => $this->hired_date,
        ];
    }
}
