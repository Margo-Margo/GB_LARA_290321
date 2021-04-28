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
    <div class="card-header-pills">
      <h3>  {{$news['title']}}</h3>
    </div>
    <div class="card-body">
         {{$news['description']}}
    </div>
    @endif
<div class="mt-3">
    <a style="width: 150px;" class="btn btn-outline-info" href="{{ url()->previous() }}">Вернуться</a>
</div>


@endsection