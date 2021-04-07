<div class="menu">
    @foreach($menu as $item)
        <div>
            <a href="{{route($item['alias'])}}">
                {{$item['title']}}
            </a>
        </div>
    @endforeach
</div>
<hr>