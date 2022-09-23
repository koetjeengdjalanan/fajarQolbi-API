<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogPostResources extends JsonResource
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
            'title' => $this->title,
            'author' => [
                'id' => $this->user->id,
                'name' =>  $this->user->name,
            ],
            'category_id' => $this->category_id,
            'category' => $this->category->name,
            'slug' => $this->slug,
            'thumbnail' => $this->thumbnail,
            'created_at' => Carbon::parse($this->created_at)->format('U'),
            'updated_at' => Carbon::parse($this->updated_at)->format('U'),
            'published_at' => Carbon::parse($this->published_at)->format('U'),
            'published_formated' => $this->published_at,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
        ];
    }
}
