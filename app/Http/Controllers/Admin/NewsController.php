<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Services\UploadFileService;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;
use App\Http\Requests\News\EditRequest;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\News\CreateRequest;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsSourcesDataQueryBuilder;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $newsQueryBuilder)
    {
        return \view('admin.news', ['newsList' => $newsQueryBuilder->getNewsPagination()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder, NewsSourcesDataQueryBuilder $newsSourcesDataQueryBuilder)
    {
        return \view('admin.createNews', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'sources' => $newsSourcesDataQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $news = new News($request->except('sources'));
        $news->sources()->associate($request->validated('sources'));
        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
            return \redirect()->route('admin.news.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder, NewsSourcesDataQueryBuilder $newsSourcesDataQueryBuilder)
    {
        return \view('admin.editNews', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'sources' => $newsSourcesDataQueryBuilder->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news, UploadFileService $uploadedFile)
    {
        $news = $news->fill($request->except('sources'));

        if ($request->hasFile('image')) {
            $news->image = $uploadedFile->uploadImage($request->file('image'));
        }elseif($news->image !== null) {
                Storage::disk('public')->delete($news->image);
                $news->image = null;
        }

        $news->sources()->associate($request->validated('sources'));
        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
             return \redirect()->route('admin.news.index')->with('success', 'Новость обновлена!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
