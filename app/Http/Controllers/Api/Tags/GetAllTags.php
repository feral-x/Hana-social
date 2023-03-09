<?php

namespace App\Http\Controllers\Api\Tags;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetTagsCollection;
use App\Models\Tag;

class GetAllTags extends Controller
{
    public function __invoke()
    {
        $tags = Tag::orderBy('title')->get();
        return GetTagsCollection::collection($tags);
    }
}
