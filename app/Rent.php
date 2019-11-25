<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Rent extends Model
{
    protected $table = 'rents';
	protected $fillable = ['fee','requestgender','phone','facebook','youtube','line','telegram','wechat','Whatsapp','web','haschild','motto','serviceaddress','servicetime','language','bust','waistline','hips','ifrent','user_id'];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function follows()
	{
		return $this->belongsToMany('App\User', 'follows','follow_id', 'user_id');
	}

	public function likes()
	{
		return $this->belongsToMany('App\User', 'likes','like_id', 'user_id');
	}

	public function age($user_id)
    {
    	$user = User::findOrFail($user_id);
    	$now = Carbon::now();
        $birthday = new Carbon($user->birthday);
        $age = $birthday->diff($now)->y;
        return $age;
    }
    public function comment()
    {
        return $this->hasMany('App\Comment','rent_id');
    }
    public function rentusers()
    {
        return $this->hasMany('App\Rentuser','rent_id');
    }
}
