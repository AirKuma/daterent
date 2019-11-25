<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rentuser extends Model
{
    protected $table = 'rentusers';
	protected $fillable = ['rent_id', 'user_id'];

	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
