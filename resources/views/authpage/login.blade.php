<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Selamat Datang | Halaman Login</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="/iconAja.ico" type="/image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

  <style>
  body {
      color: #000;
      background: linear-gradient(-45deg,#1a2a6c, #b21f1f, #fdbb2d);
      background-size: 400% 400%;
      position: relative;
      animation: change 10s ease-in-out infinite;
      overflow-x: hidden;
      padding-top: 90px;
      font-family: "poppins", sans-serif;
      margin: 0 100px;
      }
      @keyframes change {
      0%{
        background-position: 0 50%;

      }
      50%{
        background-position: 100% 50%;

      }
      100%{
        background-position: 0 50%;

      }
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{route('login')}}" style="color:white;">  </a>
    </div>
    <!-- /.login-logo -->
    <div class="card card-outline card-warning">
      <div class="card-body">
        @if ($message = Session::get('NotFound'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Terjadi kesalahan!</h5>
              {{ $message }}
          </div>
        @endif

        @if ($message = Session::get('Success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
              {{ $message }}
          </div>
        @endif

        <p class="login-box-msg"><span class="logo-lg"><img src="/icon.png" alt="KPM"></span></p>

        <form action="{{route('loginProcess')}}" method="post">
          {{ csrf_field() }}

          <div class="form-group has-feedback has-error">
            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Email/Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-danger btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- Atau -</p>
        </div>

        <p class="mb-1">
          <a href="{{route('register')}}" class="text-center text-danger">Registrasi akun baru</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>
  </body>
</html>
