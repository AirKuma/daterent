<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email','password','gender','birthday','height','weight','nationality','city','degree','careerclass','career','introduction','ideal','activation_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function requests()
    {
        return $this->hasMany('App\RentRequest');
    }
    public function rent()
    {
        return $this->hasOne('App\Rent');
    }
    public function follow()
    {
        return $this->hasOne('App\Follow');
    }
    public function follows()
    {
        return $this->hasMany('App\Follow','follow_id');
    }
    public function like()
    {
        return $this->hasOne('App\Like');
    }
    public function likes()
    {
        return $this->hasMany('App\Like','like_id');
    }
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }
    public function rentusers()
    {
        return $this->hasMany('App\Rentuser','user_id');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment','user_id');
    }
    public function comments()
    {
        return $this->hasManyThrough('App\Comment', 'App\Rent','user_id', 'rent_id');
        //return $this->belongsToMany('App\Comment', 'rents','user_id', 'rent_id');
    }
    public function accountIsActive($code) {

        $user = User::where('activation_code', '=', $code)->first();
        if($user){
            $user->actived = 1;
            $user->activated_at = Carbon::now();
            $user->activation_code = '';
            if($user->save()) {
                \Auth::login($user);
            }
            return true;
        }else{
            return false;
        }

    }
}
