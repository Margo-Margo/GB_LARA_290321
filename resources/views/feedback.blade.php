@extends('layouts.main')

@section('title')
    {{ __('labels.feedback') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            {!! Form::open(['route' => 'feedback::save']) !!}
            <label class="form-label">
                {{ __('labels.title') }}
            </label>
            <div class="form-group">
                {!! Form::text('feedback[title]','', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">
                {{ __('labels.description') }}
            </label>
            <div class="form-group">
                {!! Form::textarea('feedback[content]','', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(__('labels.save'), ['class' => "btn btn-block btn-success "]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection