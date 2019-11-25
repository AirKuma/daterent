<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
	protected $fillable = ['class','content','rent_id', 'user_id'];

	public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function rent()
    {
        return $this->belongsTo('App\Rent','rent_id');
    }
}
