@extends ('dashboard.index')

@section('content')
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pending Friends</h3>

        <div class="card-tools">

        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        @if(auth()->user()->friendsOfMinePending->isEmpty())
          <div class="col-md-12 pt-2">
            <div class="alert alert-warning alert-dismissible">
              <h5><i class="icon fas fa-exclamation-triangle"></i> Ops!</h5>
              Tidak ada Pending dalam Request pertemanan.
            </div>
          </div>
        @else
          <ul class="users-list clearfix">
            @foreach(auth()->user()->friendsOfMinePending as $pending)
              <li>
                <img src="../dist/img/user.jpg" alt="User Image">
                <span class="users-list-name">{{$pending->name}}</span>
                <a class="users-list-date" href="#">{{$pending->username}}</a>
                <div class="btn-group mt-2">
                  <a href="{{route('unfriends',$pending->username)}}" onclick="return confirm('Hapus permintaan pertemanan ke {{$pending->username}} ?')" class="btn btn-danger btn-sm">
                    <i class="fas fa-times"></i>
                  </a>
                </div>
              </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        @endif
      </div>
      <!-- /.card-body -->
      <div class="card-footer text-center">
      </div>
      <!-- /.card-footer -->
    </div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Request Friends</h3>

        <div class="card-tools">

        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        @if(auth()->user()->friendOfRequest->isEmpty())
          <div class="col-md-12 pt-2">
            <div class="alert alert-warning alert-dismissible">
              <h5><i class="icon fas fa-exclamation-triangle"></i> Ops!</h5>
              Anda tidak memiliki Request user lain untuk menjalin pertemanan.
            </div>
          </div>
        @else
          <ul class="users-list clearfix">
            @foreach(auth()->user()->friendOfRequest as $request)
              <li>
                <img src="../dist/img/user.jpg" alt="User Image">
                <span class="users-list-name">{{$request->name}}</span>
                <a class="users-list-date" href="#">{{$request->username}}</a>
                <div class="btn-group mt-2">
                  <a href="{{route('unfriends',$request->username)}}" onclick="return confirm('Hapus Request pertemanan dari {{$request->username}} ?')" class="btn btn-danger btn-sm">
                    <i class="fas fa-times"></i>
                  </a>
                  <a href="{{route('accfriend',$request->username)}}" onclick="return confirm('Terima Request pertemanan dari {{$request->username}} ?')" class="btn btn-success btn-sm">
                    <i class="fas fa-check"></i>
                  </a>
                </div>
              </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        @endif
      </div>
      <!-- /.card-body -->
      <div class="card-footer text-center">
      </div>
      <!-- /.card-footer -->
    </div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Friends</h3>

        <div class="card-tools">

        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        @if(auth()->user()->friends->isEmpty())
        <div class="col-md-12 pt-2">
          <div class="alert alert-warning alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Ops!</h5>
            Anda belum memiliki daftar teman.
          </div>
        </div>
        @else
          <ul class="users-list clearfix">
            @foreach(auth()->user()->friends as $friend)
              <li>
                <img src="../dist/img/user.jpg" alt="User Image">
                <span class="users-list-name">{{$friend->name}}</span>
                <a class="users-list-date" href="#">{{$friend->username}}</a>
                <div class="btn-group mt-2">
                  <a href="{{route('unfriends',$friend->username)}}" onclick="return confirm('Hapus pertemanan dari {{$friend->username}} ?')" class="btn btn-danger btn-sm">
                    <i class="fas fa-times"></i>
                  </a>
                </div>
              </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        @endif
      </div>
      <!-- /.card-body -->
      <div class="card-footer text-center">
      </div>
      <!-- /.card-footer -->
    </div>
  </div>
  <!-- /.col -->
@endsection
