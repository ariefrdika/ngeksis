<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
      return $this->hasMany(Post::class, 'author_id');
    }

    public function getJoinDateAttribute($value)
    {
      if($this->created_at)
      {
        $tgl = Carbon::parse($this->created_at);
        return $tgl->format('d M Y');
      }
      else{
        return "November 2020";
      }
    }

    function friendsOfMine()
    {
      return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
         ->wherePivot('accepted', '=', 1) // to filter only accepted
         ->withPivot('accepted'); // or to fetch accepted value
    }

    function friendsOfMinePending()
    {
      return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
         ->wherePivot('accepted', '=', 0) // to filter only accepted
         ->withPivot('accepted'); // or to fetch accepted value
    }

    function friendOf()
    {
      return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
         ->wherePivot('accepted', '=', 1)
         ->withPivot('accepted');
    }

    function friendOfRequest()
    {
      return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
         ->wherePivot('accepted', '=', 0)
         ->withPivot('accepted');
    }

    public function getFriendsAttribute()
    {
        if ( ! array_key_exists('friends', $this->relations)) $this->loadFriends();

        return $this->getRelation('friends');
    }

    protected function loadFriends()
    {
        if ( ! array_key_exists('friends', $this->relations))
        {
            $friends = $this->mergeFriends();

            $this->setRelation('friends', $friends);
        }
    }

    protected function mergeFriends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }

    public function getCircleFriendsAttribute()
    {
        return $this->friendsOfMine->merge($this->friendOf)->merge($this->friendsOfMinePending)->merge($this->friendOfRequest);
    }
}
