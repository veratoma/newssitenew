@extends('layouts.admin')

@section('content')
    <h2 class="title"><a href="{{route('admin.category.create')}}">Добавить категорию</a></h2>
    <table class="table table-striped table-hover table-fw-widget dataTable no-footer" id="table1" role="grid">
        <thead>
            <tr role="row">
                <th>id</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($categoryList as $category)
            <tr class="gradeA odd">
                <td>{{$category['id']}}</td>
                <td>{{$category['title']}}</td>
                <td>{{$category['description']}}</td>
                <td>{{$category['created_at']}}</td>
                <td><a href="{{route('admin.category.edit', ['category' => $category])}}">Изм.</a>{{' '}}<a href="" style="color:red">Уд.</a></td>
            </tr>
        @empty
            <tr>
                <th>Категорий нету!</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$categoryList->links()}}
@endsection
