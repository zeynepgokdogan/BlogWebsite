<nav id="sidebar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar"><img src="/Admincss/img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
    <div class="title">
      <h1 class="h5">{{$user = Auth()->user()->name}}</h1>
      <p>Web Designer</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
  <ul class="list-unstyled">
    <li class="active"><a href="{{ route('admin.homepage') }}"> <i class="icon-home"></i>Home</a></li>
    <li><a href="{{url('post_page')}}"> <i class="icon-grid"></i>Add Post</a></li>
    <li><a href="{{url('show_post')}}"> <i class="fa fa-bar-chart"></i>Show Post</a></li>

</nav>