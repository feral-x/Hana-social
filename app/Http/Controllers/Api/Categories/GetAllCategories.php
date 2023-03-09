<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetCategoriesCollection;
use App\Models\Category;

class GetAllCategories extends Controller
{
    public function __invoke()
    {
        $categories = Category::orderBy('title')->get();
        return GetCategoriesCollection::collection($categories);
    }
}
