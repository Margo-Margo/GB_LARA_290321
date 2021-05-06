@extends('layouts.main')

@section('title')
    {{ __('labels.admin_profile_create') }}
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
            <form action="{{route('admin::profile::save')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('labels.name_user') }}</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label  for="email">{{ __('labels.email') }}</label>
                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="is_admin">{{ __('labels.is_admin') }}</label>
                    <select class="form-control"  id="is_admin"  name="is_admin">
                        <option selected value="0">{{__('labels.not_admin')}}</option>
                        <option value="1">{{__('labels.is_admin')}}</option>
                    </select>


                </div>
                <div class="form-group">
                    <label for="password">{{ __('labels.new_pass') }}</label>
                    <input class="form-control"id="password" type="password" name="password">
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="{{ __('labels.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection