@extends('layouts.main')

@section('title')
    {{ __('labels.admin_news') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>{{ __('labels.create_news') }}</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {!! Form::open(['route' => 'admin::news::save']) !!}
            @if($model->id)
                <input type="hidden" name="id" value="{{$model->id}}">
            @endif
            <div class="form-group">
                <label>{{ __('labels.news_title') }}</label>
                {!! Form::text("title",$model->title ?? old('title'), ['class' => "form-control"]) !!}

            </div>
            <div class="form-group">
                <label>{{ __('labels.description') }}</label>
                {!! Form::textarea("description",$model->description ?? old('content') ??"", ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                <label>{{ __('labels.source') }}</label>
                {!! Form::select("source", $sources, $model->source, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{{ __('labels.category') }}</label>
                {!! Form::select("category_id", $categories, $model->category_id, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <input type="hidden" name="active" value="0">
                <label>
                    {!! Form::checkbox("active",1, $model->active) !!}
                    {{ __('labels.published') }}
                </label>
            </div>
            <div class="form-group">
                <label>{{ __('labels.publish_date') }}</label>
                {!! Form::date(
                        'publish_date',
                        $model->publish_date ?? old('publish_date'),
                        ['dataformatas' =>'Y-m-d', 'class' => 'form-control'] )
                !!}
            </div>
            <div class="form-group">
                <input style="width: 150px;" class="btn btn-outline-success" type="submit" value="{{ __('labels.save') }}">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection