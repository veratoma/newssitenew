<?php

namespace App\QueryBuilders;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;



final class ContactsQueryBuilder extends QueryBuilder {

    public Builder $model;

    public function __construct(){
        $this->model = Contact::query();
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function getContactPagination(int $quan=10)
    {
        return $this->model->paginate($quan);
    }

    public function getOneContact(int $id)
    {
        return $this->model->where('id', $id)->get();
    }

}
