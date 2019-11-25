<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentRequest extends Model
{
    protected $table = 'requests';
	protected $fillable = ['title','content','region','gender','reward','user_id'];

	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
