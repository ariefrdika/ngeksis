<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ngeksis</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="/iconAja.ico" type="/image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('homepage')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <span class="d-none d-md-inline">{{auth()->user()->username}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-orange">
            <img src="/img/user.jpg" class="img-circle elevation-2" alt="{{auth()->user()->name}}">
            <p>
              {{auth()->user()->name}}
              <small>Bergabung sejak {{auth()->user()->joindate}}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{route('logout')}}" class="btn btn-default btn-flat float-right">Keluar</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('homepage')}}" class="brand-link">
      <img src="/iconAja.png" alt="NGEKSIS" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NGEKSIS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-default">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Posting Gambar Baru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('homepage_me')}}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Postingan Anda
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      @if ($message = Session::get('Error'))
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Terjadi kesalahan!</h4>
          {{$message}}
        </div>
      </div>
      @endif

      @if ($message = Session::get('Success'))
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
          {{ $message }}
        </div>
      </div>
      @endif

      <div class="container-fluid">
        <div class="row">
          @yield('content')

          <div class="col-md-4">
            <div class="sticky-top mb-3 pt-3">

              <div class="card card-widget widget-user shadow">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-orange">
                  <h3 class="widget-user-username">{{auth()->user()->name}}</h3>
                  <h5 class="widget-user-desc">{{auth()->user()->username}}</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="../dist/img/user.jpg" alt="{{auth()->user()->username}}">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{{auth()->user()->posts->count()}}</h5>
                        <span class="description-text"><a href="{{route('homepage_me')}}">Postingan</a></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{{auth()->user()->friendsOfMinePending->count()}}</h5>
                        <span class="description-text"><a href="{{route('friends')}}">Pending</a></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{{auth()->user()->friendOfRequest->count()}}</h5>
                        <span class="description-text"><a href="{{route('friends')}}">Request</a></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{{auth()->user()->Friends->count()}}</h5>
                        <span class="description-text"><a href="{{route('friends')}}">Friends</a></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Saran Untuk Anda</h3>

                  <div class="card-tools">

                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    @foreach($listUser as $saran)
                      <li>
                        <img src="../dist/img/user.jpg" alt="User Image">
                        <span class="users-list-name">{{$saran->name}}</span>
                        <span class="users-list-date">{{$saran->username}}</span>
                        <div class="btn-group mt-2">
                          <a href="{{route('addfriend',$saran->username)}}" onclick="return confirm('Tambahkan {{$saran->username}} untuk menjadi teman?')" class="btn btn-warning btn-sm">
                            <i class="fas fa-user-plus"> Add</i>
                          </a>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                </div>
                <!-- /.card-footer -->
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Posting Gambar Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="myform" action="{{route('postadd')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name='image' class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Caption</label>
                    <input type="text" name='caption' class="form-control" id="exampleInputEmail1" placeholder="Isi Caption">
                  </div>
                </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="myform">Posting</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">

    </div>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

<!-- Page specific script -->
</body>
</html>
