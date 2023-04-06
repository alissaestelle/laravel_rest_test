<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class AuthorResource extends JsonResource
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
