@extends('layouts.main')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-contrast alert-danger alert-dismissible" role="alert">
                <div class="message">
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                    <strong>Danger!</strong> {{$error}}
                </div>
          </div>
        @endforeach
    @endif
@section('content')
    <article class="card card-outline mb-4">
        <div class="card-body">
            <header>
                <h4 class="card-title">Осавить отзыв</h4>
            </header>
            <form method="post" action="{{route('contacts.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormInput" class="form-label">Ваше имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required placeholder="ФИО">
                </div>
                <div class="mb-3">
                    <label for="exampleFormInput" class="form-label">Ваш телефон</label>
                    <input type="tel" pattern="8[0-9]{3}[0-9]{3}[0-9]{4}" required placeholder="Формат 89998887776" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Ваш отзыв</label>
                    <textarea class="form-control @error('feedback') is-invalid @enderror" name="feedback" id="feedback" rows="3" required placeholder="Текст..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </article>
@endsection





