@extends('layouts.main')

@section('title')
    Создание новости
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            {!! Form::open(['route' => 'news::save']) !!}
            <label class="form-label">
                Заголовок
            </label>
            <div class="form-group">
                {!! Form::text('news[title]','', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">
                Содержимое
            </label>
            <div class="form-group">
                {!! Form::textarea('news[description]','', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">
                Источник
            </label>
            <div class="form-group">
                {!! Form::text('news[source]','', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">
                Категория
            </label>
            <div class="form-group">
                {!! Form::text('news[category_id]','', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">
                Дата публикации
            </label>
            <div class="form-group">
                {!! Form::date('news[publish_date]','', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit("send", ['class' => "btn btn-success"]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection