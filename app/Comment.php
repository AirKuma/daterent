<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
	protected $fillable = ['picture','figure','attitude','fee','rent_id','user_id'];

	public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function comments()
    {
        return $this->belongsTo('App\User','rent_id');
    }
}
