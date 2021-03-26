@extends ('dashboard.index')

@section('content')

  <div class="col-md-8">
    @if($posts->count())
      @foreach($posts as $post)
        <!-- Box Comment -->
        <div class="card card-widget">
          <div class="card-header">
            <div class="user-block">
              <img class="img-circle" src="../dist/img/user.jpg" alt="User Image">
              <span class="username"><a href="#">{{$post->author->username}}</a></span>
              <span class="description">{{$post->PostAt}}</span>
            </div>
            <!-- /.user-block -->
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <img class="img-fluid pad" src="{{$post->ImageUrl}}" alt="Photo">

            <p>{{$post->caption}}</p>

            @if($post->likes->count())
              <a href="{{route('like',$post->id)}}" class="btn btn-danger btn-sm"><i class="far fa-thumbs-down"></i> Dislike</a>
            @else
              <a href="{{route('like',$post->id)}}" class="btn btn-success btn-sm"><i class="far fa-thumbs-up"></i> Like</a>
            @endif
            <span class="float-right text-muted">{{$post->likes2->count()}} suka - {{$post->koments->count()}} komentar</span>
          </div>
          <!-- /.card-body -->
          <div class="card-footer card-comments" style="display: block;">

            @foreach($post->koments as $koment)
              <div class="card-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user.jpg" alt="User Image">

                <div class="comment-text">
                  <span class="username">
                    {{"@".$koment->user->username}}
                    ({{$koment->user->name}})
                    <span class="text-muted float-right">{{$koment->PostAt}}</span>
                  </span><!-- /.username -->
                  {!!$koment->text!!}
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.card-comment -->
            @endforeach

          </div>
          <!-- /.card-footer -->
          <div class="card-footer" style="display: block;">
            <form action="{{route('koment',$post->id)}}" method="post">
              {{ csrf_field() }}
              <img class="img-fluid img-circle img-sm" src="../dist/img/user.jpg" alt="Alt Text">
              <!-- .img-push is used to add margin to elements next to floating images -->
              <div class="img-push">
                <input type="text" name="text" class="form-control form-control-sm" placeholder="Tambahkan komentar dan tekan enter untuk mengirim...">
              </div>
            </form>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      @endforeach
    @else
    <div class="callout callout-danger">
      <h5>Ops!</h5>

      <p>Tidak ada postingan sama sekali.</p>
    </div>
    @endif
  </div>
  <!-- /.col -->

@endsection
