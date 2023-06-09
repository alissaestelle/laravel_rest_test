<?php

namespace App\HTTP\Resources;

use Illuminate\HTTP\Request;
use Illuminate\HTTP\Resources\JSON\JSONResource;

class BookResource extends JSONResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            // 'authorID' => $this->authorID,
            // 'abstract' => $this->abstract,
            // 'author' => new AuthorResource($this->author),
        ];
    }
}
