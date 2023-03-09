<?php

namespace App\Http\Resources;

use App\Models\TagBook;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagsCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "title"=>$this->title,
            "count" => TagBook::where('tag_id', $this->id)->get()->count()
        ];
    }
}
