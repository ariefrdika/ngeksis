<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\carbon;

class Koment extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function getPostAtAttribute($value)
    {
      $tgl = Carbon::parse($this->created_at);
      return $tgl->format('g:i A d M Y');
    }
}
