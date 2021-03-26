<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;

class LikeController extends Controller
{
  public function add($idPost)
  {
      try
      {
        $cek = Like::where('post_id',$idPost)->where('user_id',auth()->user()->id)->get();
        if($cek->count())
        {
          $cek->first()->delete();
          return redirect(route('homepage'))->with('Success', 'Kamu sudah tidak menyukai postiang!');
        }

        $add = new Like;
        $add->post_id = $idPost;
        $add->user_id = auth()->user()->id;

        $add->save();
        return redirect(route('homepage'))->with('Success', 'Kamu sudah menyukai postiang!');

        }
        catch (\Illuminate\Database\QueryException $exception)
        {
          return redirect(route('homepage'))->with('Error', 'Terjadi  kesalahan.');
      }
  }
}
