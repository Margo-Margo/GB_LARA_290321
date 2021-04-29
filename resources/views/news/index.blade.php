@extends('layouts.main')

@section('title')
    @parent
    {{ __('labels.main') }}
@endsection

@section('content')
    <div class="d-flex flex-column">
        <h1>{{ __('labels.categories') }}</h1>
@foreach($categories as  $item)
    @php
        $url = route('news::list', ['categoryId' =>$item->id])
    @endphp

    <div class="card mt-3 p-3 border-secondary" style="width: 30rem">
        <a href="{{$url}}">{{$item->name}}</a>
    </div>

@endforeach
    </div>
@endsection