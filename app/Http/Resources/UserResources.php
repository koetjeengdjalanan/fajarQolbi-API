<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'status' => $this->status,
            'blogpost' => [
                'total' => $this->blogPost->count(),
                'list' => UserPostResources::collection($this->blogPost->sortByDesc('published_at')->values()->all()),
            ],
        ];
    }
}
