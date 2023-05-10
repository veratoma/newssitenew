@extends('layouts.admin')

@section('content')
    <h2 class="title">Запросы</h2>
    <table class="table table-striped table-hover table-fw-widget dataTable no-footer" id="table1" role="grid">
        <thead>
            <tr role="row">
                <th>id</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Ссылка на источник</th>
                <th>Комментарий</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($feedbackList as $feedback)
            <tr class="gradeA odd">
                <td>{{$feedback['id']}}</td>
                <td>{{$feedback['name']}}</td>
                <td>{{$feedback['phone']}}</td>
                <td>{{$feedback['email']}}</td>
                <td>{{$feedback['source']}}</td>
                <td>{{$feedback['feedback']}}</td>
                <td>{{$feedback['created_at']}}</td>
                <td><a href="" style="color:red">Уд.</a></td>
            </tr>
        @empty
            <tr>
                <th>Категорий нету!</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$feedbackList->links()}}
@endsection
