@extends('layouts.main')
@section('content')
    <div class="card mb-4">
        <img src="{{Auth::user()->avatar}}" alt="" width="100px">
        <h2>Добро пожаловать, {{Auth::user()->name}}</h2>
        @if (Auth::user()->is_admin)
            <br>
            <a href="{{route("admin.news.index")}}">Админка</a>
        @endif
    </div>
@endsection
