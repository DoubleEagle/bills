<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [];
    protected $dates = ["date"];

    public function user() {
      return $this->belongsTo('App\Models\User');
    }

}
