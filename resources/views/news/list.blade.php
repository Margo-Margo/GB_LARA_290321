@extends('layouts.main')

@section('title')
    @parent
    {{ __('labels.news_list') }}
@endsection

@section('content')
    <div class="d-flex flex-column">
        <h2>{{ __('labels.category') }}</h2>
    @forelse($news as $item)
        @php
            $url = route('news::card', ['news' => $item->id])
        @endphp

        <div class="card mt-3 p-3 border-secondary" style="width: 30rem">
                <a href="{{$url}}">{{$item->title}}</a>
        </div>
    @empty
            {{ __('labels.no_news') }}
    @endforelse
    </div>
@endsection