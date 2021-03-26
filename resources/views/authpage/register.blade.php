<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Selamat Datang | Daftar Akun Baru</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="/iconAja.ico" type="/image/x-icon">

  <!-- Select2 -->
  <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

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

    </div>
    <!-- /.login-logo -->
    <div class="card card-outline card-warning">
      <div class="card-body">
        @if ($message = Session::get('Error'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Terjadi kesalahan!</h5>
              {{ $message }}
          </div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Terjadi kesalahan!</h5>
              @if ($errors->has('username'))
                Username yang dimasukan sudah terdaftar! Silahkan gunakan username lainya!
              @elseif($errors->has('email'))
                Email yang dimasukan sudah terdaftar! Silahkan gunakan alamat email lainya!
              @else
                Username & Email yang dimasukan sudah terdaftar! Silahkan gunakan username & alamat email lainya!
              @endif
          </div>
        @endif

        <p class="login-box-msg"><span class="logo-lg"><img src="/icon.png" alt="KPM"></span></p>

        <form id="quickForm" name="proces" action="{{route('user_register')}}" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <div class="input-group mb-3">
              <input name="name" type="text" class="form-control" placeholder="Nama anda" autocomplete="off" value="{{Request::old('name')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input name="username" type="text" class="form-control" placeholder="Username anda" autocomplete="off" value="{{Request::old('username')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input name="email" type="email" class="form-control" placeholder="Email anda" autocomplete="off" value="{{Request::old('email')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input id="password" type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input type="password" name="repassword" class="form-control" placeholder="Ketik ulang password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-danger btn-block">Daftar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- Atau -</p>
        </div>

        <p class="mb-1">
          <a href="{{route('login')}}" class="text-center text-danger">Halaman Login</a>
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
  <!-- Select2 -->
  <script src="/plugins/select2/js/select2.full.min.js"></script>
  <!-- jquery-validation -->
  <script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    $.validator.setDefaults({
      submitHandler: function (form) {
        alert( "Data anda sudah kami rekam!" );
        form.submit();
      }
    });
    $('#quickForm').validate({
      rules: {
        name: {
          required: true,
          minlength: 4
        },
        username: {
          required: true,
          minlength: 4
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 4
        },
        repassword: {
          required: true,
          equalTo : "#password"
        },
      },
      messages: {
        name: {
          required: "Mohon isi nama anda",
          minlength: "Mohon isi nama anda minimal 4 karakter"
        },
        username: {
          required: "Mohon isi username anda",
          minlength: "Mohon isi username anda minimal 4 karakter"
        },
        email: {
          required: "Mohon isi alamat email anda",
          email: "Mohon isi alamat email anda dengan benar"
        },
        password: {
          required: "Mohon isi password akun anda",
          minlength: "Mohon isi password akun anda minimal 4 karakter"
        },
        repassword: {
          required: "Mohon ketik ulang password anda",
          equalTo: "Password yang anda ketikan tidak sesuai"
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>
  </body>
</html>
