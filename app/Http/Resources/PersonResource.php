<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data =  
        [ 
            'id' => $this->id,
            'personalScheduleId'=> $this->personal_schedule_id,
            'password'=> $this->password,
            'firstname'=> $this->firstname,
            'lastname'=> $this->lastname,
            'dateofbirth'=> $this->dateofbirth,
            'phonenumber'=> $this->phonenumber,
            'email'=> $this->email,
            'function'=> $this->function,
            //'adress' => AdressResource::collection($this->whenLoaded('adress')),
        ];

        if ($this->relationLoaded('adress'))
        {
            $data['adress'] = new AdressResource($this->adress);
        }

        return $data;
    }
}
