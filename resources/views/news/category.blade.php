@extends('layouts.main')

@section('content')
    @foreach($category as $value)
        <a href="{{route('news.showCategory', ['id'=>$value['id']])}}">
            <div class="card-body">
                <header>
                    <h4 class="card-title">{{$value['title']}}</h4>
                </header>
                <p>{{$value['description']}}</p>
            </div>
        </a>
    @endforeach
@endsection

