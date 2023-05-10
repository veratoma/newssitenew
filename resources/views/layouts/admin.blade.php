<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Beagle</title>
    <link rel="stylesheet" href="{{asset('assets/css/admin/app.css')}}" type="text/css"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
          <div class="page-title"><span>portal news</span></div>
          <div class="be-right-navbar">
            <ul class="nav navbar-nav float-right be-user-nav">
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">Admin<span class="user-name">Admin</span></a>
                <div class="dropdown-menu" role="menu">
                  <div class="user-info">
                    <div class="user-name">{{Auth::user()->name}}</div>
                  </div><a class="dropdown-item" href="{{route("account.logout")}}"><span class="icon mdi mdi-power"></span>Выход</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class="{{ request()->is('admin/news*') ? 'active' : null }}"><a href="{{route('admin.news.index')}}"><i class="icon mdi mdi-home"></i><span>Новости</span></a></li>
                  <li class="{{ request()->is('admin/category*') ? 'active' : null }}"><a href="{{route('admin.category.index')}}"><i class="icon mdi mdi-chart-donut"></i><span>Категории</span></a></li>
                  <li class="{{ request()->is('admin/contact*') ? 'active' : null }}"><a href="{{route('admin.contact.index')}}"><i class="icon mdi mdi-dot-circle"></i><span>Контакты</span></a></li>
                  <li class="{{ request()->is('admin/feedback*') ? 'active' : null }}"><a href="{{route('admin.feedback.index')}}"><i class="icon mdi mdi-border-all"></i><span>Запрос на информацию</span></a></li>
                  <li class="{{ request()->is('admin/newsSources*') ? 'active' : null }}"><a href="{{route('admin.newsSources.index')}}"><i class="icon mdi mdi-border-all"></i><span>Источники новостей</span></a></li>
                  <li class="{{ request()->is('admin/user*') ? 'active' : null }}"><a href="{{route('admin.user.index')}}"><i class="icon mdi mdi-border-all"></i><span>Пользователи</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="be-content">
        <div class="main-content container-fluid">
          @yield('content')
        </div>
      </div>
    </div>
    <script src="{{asset('assets/js/admin/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/admin/perfect-scrollbar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/admin/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/admin/app.js')}}" type="text/javascript"></script>
  </body>
</html>
