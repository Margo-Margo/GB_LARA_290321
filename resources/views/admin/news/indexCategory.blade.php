@extends('layouts.main')

@section('title')
    {{ __('labels.categories') }}
@endsection

@section('content')

    <div class="">

            <h1>{{ __('labels.categories') }}</h1>
            <p>
                <a style="width: 200px;" class="btn btn-outline-success mt-3" href="{{route('admin::news::createCategory')}}">
                    {{ __('labels.new_category') }}
                </a>
            </p>
        <div class="d-flex flex-wrap justify-content-between">

            @forelse ($categories as $item)

                <div class="card border-secondary mt-3 p-3" style="width: 16rem;">
                    <div class="card-body">
                        <h2 class="card-title">{{$item->name}}</h2>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a class="btn btn-block btn-outline-info" href="{{route('admin::news::updateCategory', ['id' => $item->id])}}">{{ __('labels.change') }}</a>
                        <a class="btn btn-block btn-outline-danger" href="{{route('admin::news::deleteCategory', ['id' => $item->id])}}">{{ __('labels.delete') }}</a>
                    </div>

                </div>

            @empty
                {{ __('labels.no_categories') }}!
            @endforelse

        </div>
            <hr>
        <div>
            {{$categories->links('vendor.pagination.simple-tailwind')}}
        </div>

    </div>
@endsection
