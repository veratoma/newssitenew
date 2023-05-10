@extends('layouts.admin')

@section('content')
    <a href="{{route('admin.parser')}}">Парсить новости</a>
    <h2 class="title"><a href="{{route('admin.news.create')}}">Добавить новость</a></h2>
    <table class="table table-striped table-hover table-fw-widget dataTable no-footer" id="table1" role="grid">
        <thead>
            <tr role="row">
                <th>id</th>
                <th>Категории</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Описание</th>
                <th>Источник</th>
                <th>Статус</th>
                <th>Фото</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($newsList as $news)
            <tr class="gradeA odd">
                <td>{{$news['id']}}</td>
                <td>{{$news->categories->map(fn($item)=> $item->title)->implode(", ")}}</td>
                <td>{{$news['title']}}</td>
                <td>{{$news['author']}}</td>
                <td>{{$news['description']}}</td>
                <td>{{$news->sources->name}}</td>
                <td>{{$news['status']}}</td>
                <td>{{$news['image']}}</td>
                <td>{{$news['created_at']}}</td>
                <td><a href="{{route('admin.news.edit', ['news' => $news])}}">Изм.</a>{{' '}}<a href="" style="color:red">Уд.</a></td>
            </tr>
        @empty
            <tr>
                <th>Новостей нету!</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$newsList->links()}}
@endsection
