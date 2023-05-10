<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\QueryBuilders\CategoriesQueryBuilder;

class CategoryController extends Controller
{

    public function index(CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        $data = $categoriesQueryBuilder->getAll();
        return \view('news.category', ['category' => $data]);
    }
}
