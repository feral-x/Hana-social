<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookCollection extends JsonResource
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
            "original_title"=>$this->original_title,
            "preview_img"=>$this->preview_img,
            "tags"=> TagsCollection::collection($this->tags()->get()),
            "categories"=> CategoriesCollection::collection($this->categories()->get()),
            "uploader"=> UploaderCollection::collection($this->uploader),
            "pages"=> PagesCollection::collection($this->pages()->get()),
            "created_at"=> $this->created_at
        ];
    }
}
