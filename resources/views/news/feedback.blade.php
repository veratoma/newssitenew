@extends('layouts.main')
@section('content')
    <article class="card card-outline mb-4">
        <div class="card-body">
            <header>
                <h4 class="card-title">Запросить информацию</h4>
            </header>
            <form method="post" action="{{route('feedback.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormInput" class="form-label">Ваше имя</label>
                    <input type="text" class="form-control" name="name" id="name" required placeholder="ФИО">
                </div>
                <div class="mb-3">
                    <label for="exampleFormInput" class="form-label">Номер телефона</label>
                    <input type="tel" pattern="8[0-9]{3}[0-9]{3}[0-9]{4}" class="form-control" required placeholder="Формат 89998887776" name="phone" id="phone">
                </div>
                <div class="mb-3">
                    <label for="exampleFormInput" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required placeholder="Email" id="email">
                </div>
                <div class="mb-3">
                    <label for="exampleFormInput" class="form-label">Источник</label>
                    <input type="url" pattern="http[s]{0,1}://.*" class="form-control" name="source" required placeholder="Ссылка на источник" id="source">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Информация</label>
                    <textarea class="form-control" name="feedback" id="feedback" required placeholder="Ваш комментарий" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </article>
@endsection
