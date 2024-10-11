<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class TasksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>  $this->id,
            'title' =>$this->title,
            'is_completed'=> $this->is_completed,
            'created_at' => $this->created_at->toDayDatetimeString(),
            'updated_at' => $this->updated_at->toDayDatetimeString()
        ];
    }
}
