@extends('layouts.main')

@section('title')
    @parent
    Новость дня
@endsection
@section('content')

    @php
        $url = route('news::card', 'id')
    @endphp
    @forelse ($news as $item)
    <div>
        {{$item['content']}}
        <btn>редактировать</btn>
    @empty
            <p>Нет новостей</p>
    @endforelse
    </div>


@endsection