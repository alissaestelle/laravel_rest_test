<?php

namespace App\HTTP\Resources;

use Illuminate\HTTP\Request;
use Illuminate\HTTP\Resources\JSON\JSONResource;
use Illuminate\Support\Facades\Log;

class AuthorResource extends JSONResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $info = [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'company' => $this->company,
            'email' => $this->email
        ];

        return $info;
    }
}
