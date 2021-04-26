@extends('layouts.main')

@section('title')
    @parent
    Новости по источникам
@endsection

@section('content')
    @forelse($news as $item)
        @php
            $url = route('news::source', ['sourceId' => $item->id])
        @endphp

        <div>
                <a href="{{$url}}">{{$item->title}}</a>
        </div>
    @empty
        Новостей нет
    @endforelse
@endsection