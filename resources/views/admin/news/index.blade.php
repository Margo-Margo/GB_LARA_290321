@extends('layouts.main')

@section('title')
    {{ __('labels.news') }}
@endsection

@section('content')

    <div class="">

            <h1>{{ __('labels.news') }}</h1>
            <p>
                <a style="width: 200px;" class="btn btn-outline-success mt-3 mr-3" href="{{route('admin::news::create')}}">
                    {{ __('labels.create_news') }}
                </a>
            </p>
            <div class="d-flex flex-wrap justify-content-between">

                @forelse ($news as $item)

                    <div class="card border-secondary mt-3 p-3" style="width: 16rem;">
                        <div class="card-body">
                        <h2 class="card-title">{{$item->title}}</h2>
                        </div>
                            <div class="card-footer bg-transparent">
                            <a class="btn btn-block btn-outline-info" href="{{route('admin::news::update', ['id' => $item->id])}}">{{ __('labels.change') }}</a>
                            <a class="btn btn-block btn-outline-danger" href="{{route('admin::news::delete', ['id' => $item->id])}}">{{ __('labels.delete') }}</a>
                            </div>

                    </div>

                @empty
                    {{ __('labels.no_news') }}!
                @endforelse

            </div>
            <hr>
            <div>
            {{$news->links('vendor.pagination.simple-tailwind')}}
        </div>

    </div>
@endsection
