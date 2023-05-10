<?php

namespace App\QueryBuilders;

use App\Models\NewsSourcesData;
use Illuminate\Database\Eloquent\Builder;



final class NewsSourcesDataQueryBuilder extends QueryBuilder {

    public Builder $model;

    public function __construct(){
        $this->model = NewsSourcesData::query();
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getNewsSourcesPagination(int $quan=10)
    {
        return $this->model->paginate($quan);
    }

    public function getOneNewsSources(int $id)
    {
        return $this->model->where('id', $id)->get();
    }

    public function getUrl()
    {
        $url = $this->model->select("id", "url")->get();
        return $url->toArray();
    }

}
