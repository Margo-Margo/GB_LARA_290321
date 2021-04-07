@foreach($categories as $id => $name)
    @php
        $url = route('news::list', ['categoryId' => $id])
    @endphp

    <div>
        <a href="{{$url}}">{{$name}}</a>
    </div>

@endforeach