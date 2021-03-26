<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\carbon;

class Post extends Model
{
  public function author()
  {
    return $this->belongsTo(User::class);
  }

  public function likes()
  {
    return $this->hasMany(Like::class);
  }

  public function likes2()
  {
    return $this->hasMany(Like::class);
  }

  public function koments()
  {
    return $this->hasMany(Koment::class);
  }

  public function getImageUrlAttribute($value)
  {
    $imageUrl = asset("/img/temp.jpg");

    if( ! is_null($this->image))
    {
      $imagePath = public_path() . "/img". "/" . $this->image;
      if(file_exists($imagePath)) $imageUrl = asset("/img". "/".  $this->image);
    }

    return $imageUrl;
  }

  public function getPostAtAttribute($value)
  {
    $tgl = Carbon::parse($this->created_at);
    return $tgl->format('g:i A d M Y');
  }
}
