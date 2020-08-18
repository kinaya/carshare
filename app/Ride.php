<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'date', 'distance', 'tax'
  ];

    // Add relationship to a user
    public function user() {
      return $this->belongsTo('App\User');
    }
}
