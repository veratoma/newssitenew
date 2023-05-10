@extends('layouts.admin')

@section('content')
    <h2 class="title">Пользователи</h2>
    <table class="table table-striped table-hover table-fw-widget dataTable no-footer" id="table1" role="grid">
        <thead>
            <tr role="row">
                <th>id</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Потдверждение Email</th>
                <th>Права на админа</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($userList as $user)
            <tr class="gradeA odd">
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['email_verified_at']}}</td>
                <td>{{$user['is_admin']}}|<a href="{{route('admin.user.edit', ['user' => $user])}}">Изм.</a></td>
                <td>{{$user['created_at']}}</td>
            </tr>
        @empty
            <tr>
                <th>Новостей нету!</th>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$userList->links()}}
@endsection
