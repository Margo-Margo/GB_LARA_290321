@extends('layouts.main')

@section('title')
    {{ __('labels.admin_categories') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>{{ __('labels.create_category') }}</h1>
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
            {!! Form::open(['route' => 'admin::news::saveCategory']) !!}
            @if($model->id)
                <input type="hidden" name="id" value="{{$model->id}}">
            @endif
            <div class="form-group">
                <label>{{ __('labels.name') }}</label>
                {!! Form::text("name",$model->name ?? old('name'), ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                <input type="hidden" name="active" value="0">
                <label>
                    {!! Form::checkbox("active",1, $model->active) !!}
                    {{ __('labels.published') }}
                </label>
            </div>

            <div class="form-group">
                <input style="width: 150px;" class="btn btn-outline-success" type="submit" value="{{ __('labels.save') }}">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

