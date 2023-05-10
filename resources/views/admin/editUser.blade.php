@extends('layouts.admin')

@section('content')
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
    <form method="post" action="{{route('admin.user.update', ['user' => $user])}}">
        @csrf
        @method('put')
        <div class="col-md-12">
            <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Редактировать</div>
            <div class="card-body">
                <form>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="name">Имя</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" disabled id='name' value="{{$user['name']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="email">Email</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control" disabled id="email" value="{{$user['email']}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="is_admin">Права админа</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <select class="form-control @error('is_admin') is-invalid @enderror" value="{{ old('is_admin') }}" name="is_admin" id="is_admin">
                            <option @if((int) $user['is_admin'] === 0) selected @endif value="0">Доступа нет</option>
                            <option @if((int) $user['is_admin'] === 1) selected @endif value="1">Доступ есть</option>
                        </select>
                    </div>
                </div>
                </form>
            </div>
        </div>
            <div class="form-group">
                <div class="col-12 col-sm-8 col-lg-6">
                    <button class="btn btn-space btn-primary" type="submit">Submit</button>
                </div>
            </div>
      </div>
    </form>
@endsection
