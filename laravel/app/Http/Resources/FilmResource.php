<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'title' => $this->name,
            'type' => $this->type,
            'year' => $this->year,
            'genre' => $this->genre,
            'description' => $this->description,
            'image' => $this->image,
            'trailer' => $this->trailer
        ];
    }
}
