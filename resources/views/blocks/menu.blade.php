<div class="menu container d-flex ">
    @foreach($menu as $item)
        <div>
            <a style="width: 150px;" class="btn btn-outline-info mr-3 mt-3" href="{{route($item['alias'])}}">
                {{$item['title']}}
            </a>
        </div>
    @endforeach
</div>
<hr>