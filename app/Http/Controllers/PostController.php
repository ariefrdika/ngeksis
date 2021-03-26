<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class PostController extends Controller
{
  public function index()
  {
      $user = auth()->user()->friends->pluck('id')->all();
      array_push($user,auth()->user()->id);

      $posts = Post::with(['koments','likes' => function($q){
        $q->where('user_id', '=', auth()->user()->id);
      }])->whereIn('author_id',$user)->orderBy('created_at', 'DESC')->get();

      $saranTeman = auth()->user()->CircleFriends->pluck('id')->all();
      array_push($saranTeman,auth()->user()->id);
      $listUser = User::whereNotIn('id',$saranTeman)->inRandomOrder()->take(8)->get();

      return view('dashboard.post',compact('posts','listUser'));
  }

  public function add(Request $request)
  {
      $this->validate($request, ['caption'            => 'required|min:5',
                                'image'               => 'image|mimes:jpeg,png,jpg',
                              ]);

      if ($request->image)
      {
        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'img';
        $file->move($tujuan_upload,$nama_file);
      }

      try
      {
        $add = new Post;
        $add->author_id = auth()->user()->id;
        $add->caption = $request->caption;
        if($request->image)
        {
          $add->image = $nama_file;
        }

        $add->save();
        return redirect(route('homepage'))->with('Success', 'Gambar berhasil diposting!');

        }
        catch (\Illuminate\Database\QueryException $exception)
        {
          return redirect(route('homepage'))->with('Error', 'Ops! Gambar gagal diposting.');
      }
  }

  public function index_me()
  {
      $posts = Post::where('author_id',auth()->user()->id)->get();

      $saranTeman = auth()->user()->CircleFriends->pluck('id')->all();
      array_push($saranTeman,auth()->user()->id);
      $listUser = User::whereNotIn('id',$saranTeman)->inRandomOrder()->take(8)->get();
      
      return view('dashboard.post',compact('posts','listUser'));
  }
}
