<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetTagsCollection;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GetTagsController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        return GetTagsCollection::collection($tags);
    }
}
