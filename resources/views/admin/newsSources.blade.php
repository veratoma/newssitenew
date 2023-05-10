@extends('layouts.admin')

@section('content')
    <h2 class="title"><a href="{{route('admin.newsSources.create')}}">Добавить источник</a></h2>
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
        @forelse ($newsSourcesList as $newsSource)
            <tr class="gradeA odd">
                <td>{{$newsSource['id']}}</td>
                <td>{{$newsSource['name']}}</td>
                <td>{{$newsSource['description']}}</td>
                <td>{{$newsSource['created_at']}}</td>
                <td><a href="{{route('admin.newsSources.edit', ['newsSource' => $newsSource])}}">Изм.</a>{{' '}}<a href="" style="color:red">Уд.</a></td>
            </tr>
        @empty
            <tr>
                <th>Новостей нету!</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$newsSourcesList->links()}}
@endsection
