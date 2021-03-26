<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Friend;

class UserController extends Controller
{
    public function user_register(Request $request)
    {
      $this->validate($request, ['name' => 'required|min:4',
                                'username' => 'required|min:4|unique:users,username',
                                'email' => 'required|email|unique:users,email,',
                                'password' => 'required|min:4',
                                ]);
      try {
        $addAkunUser = new User;
        $addAkunUser->username = $request->username;
        $addAkunUser->name = $request->name;
        $addAkunUser->email = $request->email;
        $addAkunUser->password = bcrypt($request->password);
        $addAkunUser->level_user = 1;
        $addAkunUser->remember_token = str_random(60);

        $addAkunUser->save();

        return redirect(route('login'))->with('Success', 'Akun anda sudah aktif, silahkan login');

        } catch (\Illuminate\Database\QueryException $exception) {
          return redirect(route('register'))->with('Error', 'Terjadi kesalahan! Harap periksa inputan.');
      }
    }

    public function friends()
    {
      $saranTeman = auth()->user()->CircleFriends->pluck('id')->all();
      array_push($saranTeman,auth()->user()->id);
      $listUser = User::whereNotIn('id',$saranTeman)->inRandomOrder()->take(8)->get();

      return view('dashboard.friends',compact('listUser'));
    }

    public function addfriend($username)
    {
      $friendData = User::where('username',$username)->get()->first();

      $addFriends = new Friend;
      $addFriends->user_id = auth()->user()->id;
      $addFriends->friend_id = $friendData->id;
      $addFriends->accepted = '0';
      $addFriends->save();

      $saranTeman = auth()->user()->CircleFriends->pluck('id')->all();
      array_push($saranTeman,auth()->user()->id);
      $listUser = User::whereNotIn('id',$saranTeman)->inRandomOrder()->take(8)->get();

      return redirect()->back()->with('Success', 'Permintaan pertemanan sudah diajukan, harap menunggu balasan pertemanan anda.');
    }

    public function accfriend($username)
    {
      $friendData = User::where('username',$username)->get()->first();
      $requestnya = Friend::where('user_id',$friendData->id)->where('friend_id', auth()->user()->id)->get()->first();
      $requestnya->accepted = "1";
      $requestnya->save();

      $saranTeman = auth()->user()->CircleFriends->pluck('id')->all();
      array_push($saranTeman,auth()->user()->id);
      $listUser = User::whereNotIn('id',$saranTeman)->inRandomOrder()->take(8)->get();

      return redirect()->back()->with('Success', 'Permintaan pertemanan sudah diajukan, harap menunggu balasan pertemanan anda.');
    }

    public function unfriends($username)
    {
      $friendData = User::where('username',$username)->get()->first();

      if(Friend::where('user_id',auth()->user()->id)->where('friend_id', $friendData->id)->get()->isEmpty())
      {
        Friend::where('user_id',$friendData->id)->where('friend_id', auth()->user()->id)->get()->first()->delete();
      }
      else
      {
        Friend::where('user_id',auth()->user()->id)->where('friend_id', $friendData->id)->get()->first()->delete();        
      }

      $saranTeman = auth()->user()->CircleFriends->pluck('id')->all();
      array_push($saranTeman,auth()->user()->id);
      $listUser = User::whereNotIn('id',$saranTeman)->inRandomOrder()->take(8)->get();

      return redirect()->back()->with('Success', 'Pertemanan berhasil dihapus.');
    }
}
