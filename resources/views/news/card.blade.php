@extends('layouts.main')

@section('title')
    @parent
    Карточка новости
@endsection
@section('content')

    @php
        $url = route('news::card', [$news->id])
    @endphp
    @if ($news)
    <div>
      <h3>  {{$news['title']}}</h3>
    </div>
    <div>
         {{$news['description']}}
    </div>
    @endif



@endsection