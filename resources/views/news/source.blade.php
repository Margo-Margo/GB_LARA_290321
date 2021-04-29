@extends('layouts.main')

@section('title')
    @parent
    {{ __('labels.news_source') }}
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
        {{ __('labels.no_news') }}
    @endforelse
@endsection