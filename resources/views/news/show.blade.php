@extends('layouts.main')


@section('content')
    <div class="col-md-9">
        
        <article class="card mb-4">
        <header class="card-header text-center">
            <div class="card-meta">
            <a href="#"><time class="timeago" datetime="2021-09-26 20:00" timeago-id="1">{{$show[0]['created-at']}}</time></a>    <a href="page-category.html">{{$show[0]['author']}}</a>
            </div>
            <a href="post-image.html">
            <h1 class="card-title">{{$show[0]['title']}}</h1>
            </a>
        </header>
        <a href="post-image.html">
            <img class="card-img" src="img/articles/1.jpg" alt="" height="500px">
        </a>
        <div class="card-body">

            {{$show[0]['text']}}

      </div>
    </article><!-- /.card -->

  </div>
@endsection

{{-- @foreach ($show as $value)
<div style="border:1px solid black">
    <h3>{{$value['title']}}</h3>
    <p>{{$value['text']}}</p>
    <p>Author: {{$value['author']}} | {{$value['created-at']}}</p>
</div>
@endforeach --}}