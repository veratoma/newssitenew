@extends('layouts.main')

@section('content')

@foreach ($news as $value)
    <div class="col-md-3">
        <article class="card mb-4">
        <header class="card-header">
            <div class="card-meta">
            <time class="timeago" datetime="2021-09-26 20:00" timeago-id="1">{{$value['created_at']}}</a>    {{$value['author']}}
            </div>
            <a href="{{route('news.show', ['id'=> $value['id']])}}">
            <h4 class="card-title">{{$value['title']}}</h4>
            </a>
        </header>
        <a href="{{route('news.show', ['id'=> $value['id']])}}">
            <img class="card-img" src="{{Storage::disk('public')->url($value['image'])}}" alt="" height="150px">
        </a>
        <div class="card-body">
            <p class="card-text">{{$value['description']}}</p>
        </div>
        </article><!-- /.card -->
    </div>
@endforeach
{{$news->links()}}
@endsection
