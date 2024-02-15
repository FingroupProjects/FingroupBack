<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'FIO' => $this->name . ' ' . $this->surname . ' ' . $this->lastname,
            'position' => $this->position->name,
            'image' => Storage::url($this->image)
        ];
    }
}
