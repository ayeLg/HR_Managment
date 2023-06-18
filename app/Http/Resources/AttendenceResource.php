<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class AttendenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'status' => $this->status,
            'employ_id' => $this->employ_id,

            'created_at' => $this->created_at->format('d/m/Y'),

            'updated_at' => $this->updated_at->format('d/m/Y'),

        ];
    }
}
