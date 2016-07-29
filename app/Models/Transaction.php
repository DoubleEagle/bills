<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['hash','amount','title'];
    protected $dates = ["date"];

    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = $amount*100;
    }

    public function user() {
      return $this->belongsTo('App\Models\User');
    }

}
