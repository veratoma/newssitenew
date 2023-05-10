<?php

namespace App\QueryBuilders;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder;



final class FeedbacksQueryBuilder extends QueryBuilder {

    public Builder $model;

    public function __construct(){
        $this->model = Feedback::query();
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getFeedbackPagination(int $quan=10)
    {
        return $this->model->paginate($quan);
    }

    public function getOneFeedback(int $id)
    {
        return $this->model->where('id', $id)->get();
    }

}
