<div class="header_main">
   <div class="mobile_menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo_mobile"><a href="{{ url('/') }}"><img src="images/logo.png"></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/userhome') }}">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/blogpost') }}">Blog post</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
               </li>
            </ul>
         </div>
      </nav>
   </div>
   <div class="container-fluid">
      <div class="logo"><a href="{{ url('/') }}"><img src="images/logo.png"></a></div>
      <div class="menu_main">
         <ul>
            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
            <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ url('/about') }}">About</a></li>
            <li class="{{ Request::is('services') ? 'active' : '' }}"><a href="{{ url('/services') }}">Services</a></li>
            <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{ url('/blog') }}">Blog</a></li>

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
