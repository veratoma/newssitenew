@extends('layouts.main')

@section('content')
    <h3>Приветсвуем вас на сайте новостей!</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>
    Hic esse explicabo soluta qui mollitia nisi similique. Quis perferendis dolor tempora iste?<br>
    Exercitationem architecto a accusantium omnis quas quos molestias iste?<br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi iusto laboriosam error. Ipsa ab omnis maiores praesentium delectus,<br>
     facilis vel eos non rem eaque beatae, quasi harum iure eum blanditiis?</p>
    <a href="{{route('news.category')}}">Категории</a>
@endsection
