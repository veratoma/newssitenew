<?php

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;



final class NewsQueryBuilder extends QueryBuilder {

    public Builder $model;

    public function __construct(){
        $this->model = News::query();
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getNewsPagination(int $quan=10)
    {
        return $this->model->with('categories', 'sources')->paginate($quan);
    }

    public function getOneNews(int $id)
    {
        return $this->model->where('id', $id)->get();
    }

    // public function getNewsByCategory()
    // {
    //     // $query = [];

    //     // $data = new News(['id', 'title', 'description', 'author','created_at']);
    //     // foreach ($data->categoriesHasNews as $category) {
    //     //     $query[]=[
    //     //         'id' => $category->pivot->category_id,
    //     //     ];
    //     // }
    //     return [];
    //     //$data->categoriesHasNews()->get();
    // }

}
