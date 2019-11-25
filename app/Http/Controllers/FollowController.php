<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Follow;
use Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$step)
    {
        $mfollow = Follow::orderBy('created_at', 'desc')->where('user_id',$id)->paginate(2);
        $gfollow = Follow::orderBy('created_at', 'desc')->where('follow_id',$id)->paginate(2);
        return view('users.myfollow',compact('step','mfollow','gfollow'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $follow = new Follow; 
        $follow->user_id = Auth::user()->id;
        $follow->follow_id = $id;    
        $follow->save();
        
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Follow::destroy($id);

        return redirect()->back();
    }
}
