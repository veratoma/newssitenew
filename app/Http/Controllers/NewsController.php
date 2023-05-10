<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\QueryBuilders\NewsQueryBuilder;

class NewsController extends Controller
{

    public function index()
    {
       return \view('news.index');
    }


    public function news(NewsQueryBuilder $newsQueryBuilder)
    {
        $data = $newsQueryBuilder->getNewsPagination(32);
        return \view('news.news', ['news' => $data]);
    }

    public function show(NewsQueryBuilder $newsQueryBuilder, int $id)
    {
        return \view('news.show', ['show' => $newsQueryBuilder->getOneNews($id)]);
    }

    public function showCategory(NewsQueryBuilder $newsQueryBuilder, int $id)
    {
    // dd($newsQueryBuilder->getNewsByCategory());
    //dd($newsQueryBuilder->getNewsByCategory());
        //return \view('news.news', ['news' => [$newsQueryBuilder->getNewsByCategory()]]);
    }
}
