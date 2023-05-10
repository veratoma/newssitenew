<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\NewsSourcesData;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsSourcesData\EditRequest;
use App\QueryBuilders\NewsSourcesDataQueryBuilder;
use App\Http\Requests\NewsSourcesData\CreatedRequest;

class NewsSourcesDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsSourcesDataQueryBuilder $newsSourcesDataQueryBuilder)
    {
        return \view('admin.newsSources', [
            'newsSourcesList' => $newsSourcesDataQueryBuilder->getNewsSourcesPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.createNewsSources');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatedRequest $request)
    {
        $newsSource = NewsSourcesData::create($request->validated());
        if ($newsSource) {
            return redirect()->route('admin.newsSources.index');
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
    public function edit(NewsSourcesData $newsSource)
    {
        return \view('admin.editNewsSources', [
            'newsSource' => $newsSource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, NewsSourcesData $newsSource)
    {
        $newsSource = $newsSource->fill($request->validated());
        if ($newsSource->save()) {
            return \redirect()->route('admin.newsSources.index')->with('success', 'Источник обновлен!');
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
