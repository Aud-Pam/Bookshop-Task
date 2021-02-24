<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'file' => 'storage/images/' . $this->file,
            'price' => $this->price,
            'author' => $this->authorList($this->author),
            'genre' => $this->genreList($this->genre),
            $this->mergeWhen($request->book, [
                'description' => $this->description
            ]),
        ];
    }
}
