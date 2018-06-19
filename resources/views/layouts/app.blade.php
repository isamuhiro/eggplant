<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VerduraNet</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-green.min.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="/plugins/iCheck/flat/blue.css" rel="stylesheet" />
  <link href="/bower_components/lou-multi-select-e052211/css/multi-select.css" rel="stylesheet" />
  <link href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" />
  

  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini fixed">
<div class="wrapper">
    <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>V</b>.et</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Verdura</b>Net</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img avatar="{{ Auth::user()->name}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"> {{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img avatar="{{ Auth::user()->name}}" class="img-circle" alt="User Image">
                <p>
                   {{Auth::user()->name}} - Administrador
                  <!-- <small>Membro desde {{--date("F j, Y",strtotime(Auth::user()->created_at))--}}</small> -->
                  <small>{{Auth::user()->email}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="/clientes/{{Auth::user()->id}}" class="btn btn-default btn-flat"><i class="fa fa-gears"></i>  Configurações</a>
                </div> -->
                <div class="pull-right">
                  <form action="/logout" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default btn-flat">Sair</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img avatar="{{ Auth::user()->name}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">Gerenciamento</li>
        <li {{ (Request::is('produtos') ? 'class=active' : '') }}><a href="/produtos"><i class="fa fa-shopping-basket"></i> <span>Produtos</span></a></li>
        <li {{ (Request::is('clientes') ? 'class=active' : '') }}><a href="/clientes"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
        <li {{ (Request::is('store') ? 'class=active' : '') }}><a href="/store"><i class="fa fa-building"></i> <span>Lojas/Empresas</span></a></li>
        <li {{ (Request::is('motoristas') ? 'class=active' : '') }}><a href="/motoristas/"><i class="fa fa-car"></i> <span>Motoristas</span></a></li>
        <li class="header">Pedidos</li>
        <li {{ (Request::is('pedidos/historico') ? 'class=active' : '') }}><a href="/pedidos/historico/"><i class="fas fa-location-arrow"></i> <span>Solicitação Cliente</span></a></li>
        <li {{ (Request::is('rotas/config') ? 'class=active' : '') }}><a href="/rotas/config/"><i class="fa fa-truck"></i> <span>Rotas</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
        <small>@yield('description')</small>
      </h1>
      @yield('breadcrumb')
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

    @yield('content')
     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Desenvolvido por BigBangStudio
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="http://bigbangstudio.com.br" target="_blank">BigBangStudio</a>.</strong> All rights reserved.
  </footer>

</div>
 <!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('bower_components/lou-multi-select-e052211/js/jquery.multi-select.js') }}"></script>

<script src="{{ asset('bower_components/inputmask/dist/inputmask/dependencyLibs/inputmask.dependencyLib.js') }}"></script>
<script src="{{ asset('bower_components/inputmask/dist/min/inputmask/inputmask.min.js') }}"></script>
<script src="{{ asset('bower_components/inputmask/dist/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('bower_components/inputmask/dist/inputmask/inputmask.extensions.js') }}"></script>
<script src="{{ asset('bower_components/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}"></script>
<script src="{{ asset('bower_components/inputmask/dist/inputmask/bindings/inputmask.binding.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('bower_components/chart.js/src/Chart.Bar.js') }}"></script>
<script src="{{ asset('bower_components/chart.js/src/Chart.Doughnut.js') }}"></script>
<script>
  /*
     * LetterAvatar
     * 
     * Artur Heinze
     * Create Letter avatar based on Initials
     * https://codepen.io/arturheinze/pen/ZGvOMw?editors=1010
     * based on https://gist.github.com/leecrossley/6027780
     */
    (function(w, d){


function LetterAvatar (name, size) {

    name  = name || '';
    size  = size || 60;

    var colours = [
            "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
            "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
        ],

        nameSplit = String(name).toUpperCase().split(' '),
        initials, charIndex, colourIndex, canvas, context, dataURI;


    if (nameSplit.length == 1) {
        initials = nameSplit[0] ? nameSplit[0].charAt(0):'?';
    } else {
        initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
    }

    if (w.devicePixelRatio) {
        size = (size * w.devicePixelRatio);
    }
        
    charIndex     = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
    colourIndex   = charIndex % 20;
    canvas        = d.createElement('canvas');
    canvas.width  = size;
    canvas.height = size;
    context       = canvas.getContext("2d");
     
    context.fillStyle = colours[colourIndex - 1];
    context.fillRect (0, 0, canvas.width, canvas.height);
    context.font = Math.round(canvas.width/2)+"px Arial";
    context.textAlign = "center";
    context.fillStyle = "#FFF";
    context.fillText(initials, size / 2, size / 1.5);

    dataURI = canvas.toDataURL();
    canvas  = null;

    return dataURI;
}

LetterAvatar.transform = function() {

    Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name) {
        name = img.getAttribute('avatar');
        img.src = LetterAvatar(name, img.getAttribute('width'));
        img.removeAttribute('avatar');
        img.setAttribute('alt', name);
    });
};


// AMD support
if (typeof define === 'function' && define.amd) {
    
    define(function () { return LetterAvatar; });

// CommonJS and Node.js module support.
} else if (typeof exports !== 'undefined') {
    
    // Support Node.js specific `module.exports` (which can be a function)
    if (typeof module != 'undefined' && module.exports) {
        exports = module.exports = LetterAvatar;
    }

    // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
    exports.LetterAvatar = LetterAvatar;

} else {
    
    window.LetterAvatar = LetterAvatar;

    d.addEventListener('DOMContentLoaded', function(event) {
        LetterAvatar.transform();
    });
}

})(window, document);
</script>
@yield('script')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>