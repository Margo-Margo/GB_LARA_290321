@extends('layouts.main')

@section('title')
    @parent
    Все новости
@endsection
@section('content')

    @php
        $url = route('news::card', 'id')
    @endphp
    @forelse ($news as $item)
    <div>
        {{$item['content']}}
    @empty
            <p>Нет новостей</p>
    @endforelse
    </div>


@endsection