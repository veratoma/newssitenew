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
    <form method="post" action="{{route('admin.news.store')}}">
        @csrf
        <div class="col-md-12">
            <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Добавить запись</div>
            <div class="card-body">
                <form>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="title">Название</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required name="title" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="author">Автор</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" id="author" name="author" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="category_ids">Категория</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <select class="select2-selection__rendered @error('category_ids') is-invalid @enderror" name="category_ids[]" id="category_ids" multiple>
                            <option value="0">Выбрать</option>
                            @foreach ($categories as $category)
                                <option @if(in_array($category['id'],(array) old('category_ids'))) selected @endif value="{{$category['id']}}">{{$category['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="status">Статус</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="@error('status') is-invalid @enderror" value="{{ old('status') }}" name="status" id="status">
                                <option value="0">Выбрать</option>
                                <option @if(old('status') === 'draft') selected @endif value="draft">draft</option>
                                <option @if(old('status') === 'active') selected @endif value="active">active</option>
                                <option @if(old('status') === 'blocked') selected @endif value="blocked">blocked</option>
                            </select>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="description">Текст</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <textarea class="form-control @error('description') is-invalid @enderror" required name="description" id="description">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputDisabled3">Фото</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                    <input class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" id="photo" name="photo" type="text">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="sources">Источник</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <select class="select2-selection__rendered @error('sources') is-invalid @enderror" name="sources" id="sources">
                            <option value="0">Выбрать</option>
                            @foreach ($sources as $source)
                                <option @if ((int) old('sources') === $source['id']) selected @endif value="{{$source['id']}}">{{$source['name']}}</option>
                            @endforeach
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
