@extends('layouts.main')

@section('title')
    {{ __('labels.admin_profile') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>{{ __('labels.profile') }}</h1>
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
            <form action="{{route('admin::profile::update')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>{{ __('labels.name_user') }}</label>
                    <input class="form-control" type="text" name="name"
                           value="{{$user->name ?? old('name')}}">
                </div>
                <div class="form-group">
                    <label>{{ __('labels.email') }}</label>
                    <input class="form-control" type="email" name="email"
                           value="{{$user->email ?? old('email')}}">
                </div>
                <div class="form-group">
                    <label>{{ __('labels.new_pass') }}</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label>{{ __('labels.password') }}</label>
                    <input class="form-control" type="password" name="current_password">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="{{ __('labels.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection