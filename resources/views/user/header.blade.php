<div class="header_main">
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo_mobile"><a href="{{ url('/') }}"><img src="images/logo.png" alt="Logo"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/blogpost') }}">Blog post</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="logo"><a href="{{ url('/') }}"><img src="images/logo.png" alt="Logo"></a></div>
        <div class="menu_main">
            <ul>
                <li class="{{ Request::is('user/homepage') ? 'active' : '' }}"><a href="{{ url('/user/homepage') }}">Home</a></li>
                <li class="{{ Request::is('user/blogpost') ? 'active' : '' }}"><a href="{{ url('/user/blogpost') }}">Blog post</a></li>

                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <x-app-layout>
                        </x-app-layout>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>
