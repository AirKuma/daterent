<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommentStoreRequest;
use App\Comment;
use App\User;
use App\Rent;
use Auth;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user', ['only' => ['index']]);
        $this->middleware('comment', ['only' => ['create']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$step)
    {
        $user = User::findOrFail($id);
        if($user->rent()->first()!=null)
            $mycomments = Comment::orderBy('created_at', 'desc')->where('rent_id',$user->rent()->first()->id)->paginate(2);
        else
            $mycomments = Comment::where('user_id','-1')->paginate(2);
        $comments = Comment::orderBy('created_at', 'desc')->where('user_id',$id)->paginate(2);
        return view('users.mycomment',compact('step','mycomments','comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request,$id)
    {
        $comment = new Comment;
        $comment->picture=$request->picture;  
        $comment->figure=$request->figure;  
        $comment->attitude=$request->attitude;  
        $comment->fee=$request->fee;    
        $comment->user_id = Auth::user()->id;
        $comment->rent_id = $id;    
        $comment->save();

        $rent = Rent::findOrFail($id);
        return redirect()->route('rent.show',$rent->user()->first()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
