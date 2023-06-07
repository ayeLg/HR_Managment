<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array

    {

        return [

            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
            'photo' => $this->photo,
            'position' => $this->position,
            'salary' => $this->salary,
            'role' => $this->role,

            'created_at' => $this->created_at->format('d/m/Y'),

            'updated_at' => $this->updated_at->format('d/m/Y'),

        ];
    }
}
