@extends('layouts.admin')

@section('content')
    <h2 class="title">Отзывы</h2>
    <table class="table table-striped table-hover table-fw-widget dataTable no-footer" id="table1" role="grid">
        <thead>
            <tr role="row">
                <th>id</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Комментарий</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($contactList as $contact)
            <tr class="gradeA odd">
                <td>{{$contact['id']}}</td>
                <td>{{$contact['name']}}</td>
                <td>{{$contact['phone']}}</td>
                <td>{{$contact['feedback']}}</td>
                <td>{{$contact['created_at']}}</td>
                <td><a href="" style="color:red">Уд.</a></td>
            </tr>
        @empty
            <tr>
                <th>Категорий нету!</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$contactList->links()}}
@endsection
