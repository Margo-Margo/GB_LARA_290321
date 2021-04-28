@extends('layouts.main')

@section('title')
    @parent
    Список новостей
@endsection

@section('content')
    @forelse($news as $item)
        @php
            $url = route('news::card', ['news' => $item->id])
        @endphp

        <div class="card-title">
                <a href="{{$url}}">{{$item->title}}</a>
        </div>
    @empty
        Новостей нет
    @endforelse
@endsection