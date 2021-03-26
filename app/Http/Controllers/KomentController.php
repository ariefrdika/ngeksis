<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Koment;

class KomentController extends Controller
{
  public function add($idPost, Request $request)
  {
    $this->validate($request, ['text' => 'required|min:1',]);

    try
    {
      $add = new Koment;
      $add->post_id = $idPost;
      $add->user_id = auth()->user()->id;
      $add->text = $request->text;

      $add->save();
      return redirect(route('homepage'))->with('Success', 'Komentar berhasil ditambahkan!');

      }
      catch (\Illuminate\Database\QueryException $exception)
      {
        return redirect(route('homepage'))->with('Error', 'Ops! Komentar gagal ditambahkan.');
    }
  }
}
