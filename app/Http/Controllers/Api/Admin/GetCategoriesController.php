<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetCategoriesCollection;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GetCategoriesController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return GetCategoriesCollection::collection($categories);
    }
}
