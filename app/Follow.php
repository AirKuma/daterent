<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';
	protected $fillable = ['follow_id', 'user_id'];

	public function mfollow()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function gfollow()
    {
        return $this->belongsTo('App\User','follow_id');
    }
}
