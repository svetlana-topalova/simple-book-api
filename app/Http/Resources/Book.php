<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'cover' => $this->cover ? Storage::url($this->cover) : '',
            'published_at' => $this->created_at ? $this->created_at->format('d/m/Y H:i') : "",
            'author' => User::make($this->author)
        ];
    }
}
