@extends('layouts.main')

@section('title')
    @parent
    Список новостей
@endsection

@section('content')
    @forelse($news as $id => $item)
        @php
            $url = route('news::card', ['id' => $id])
        @endphp

        <div>
            <a href="{{$url}}">{{$item['title']}}</a>
        </div>
    @empty
        Новостей нет
    @endforelse
@endsection