<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PagesCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "volume" => $this->volume,
            "chapter" => $this->chapter,
            "page" => $this->page,
            "url" => $this->url,
            "book_id" => $this->book_id,
        ];
    }
}
