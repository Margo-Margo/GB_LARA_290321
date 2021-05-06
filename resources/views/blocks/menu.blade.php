
<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <li class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('menu.lang') }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('locale',['lang' => 'ru']) }}">
                            ru
                        </a>
                        <a class="dropdown-item" href="{{ route('locale', ['lang' => 'en'])}}">
                            en
                        </a>
                    </div>
                </li>

                @foreach($menu as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($item['alias'])}}">
                            {{$item['title']}}
                        </a>
                    </li>
                @endforeach

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if(Auth::user()->is_admin)
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('menu.admin') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin::news::index')}}">
                                    {{ __('labels.news') }}
                                </a>
                                <a class="dropdown-item" href="{{route('admin::news::indexCategory')}}">
                                    {{ __('labels.categories') }}
                                </a>

                                <a class="dropdown-item" href="{{route('admin::profile::show')}}">
                                    {{ __('menu.profile') }}
                                </a>
                                <a class="dropdown-item" href="{{route('admin::profile::create')}}">
                                    {{ __('menu.profile_create') }}
                                </a>
                                <a class="dropdown-item" href="{{route('admin::parser')}}">
                                    Parser
                                </a>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                @endguest
            </ul>
    </div>

</nav>


{{--
<div class="menu container d-flex ">
    @foreach($menu as $item)
        <div>
            <a style="width: 250px;" class="btn btn-outline-info mr-3 mt-3" href="{{route($item['alias'])}}">
                {{$item['title']}}
            </a>
        </div>
            @endforeach
</div>
<hr>
--}}