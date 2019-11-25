<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use App\User;
use App\Http\Requests\VideoStoreRequest;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['allvideo']]);
        $this->middleware('user', ['except' => ['allvideo']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        $videos = Video::where('user_id','=',$user->id)->orderBy('created_at', 'desc')->paginate(2);
        return view('users.videos.index',compact('videos','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,VideoStoreRequest $request)
    {
        $video = new video;
        $video->video = $request->video;
        $video->describe = $request->describe;
        $video->user_id = $id;
        $video->save();

        return redirect()->route('user.video', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allvideo($id)
    {
        $user = User::findOrFail($id);
        $videos = Video::where('user_id',$id)->get();
        return view('rents.video',compact('videos','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$vid)
    {
        $video = Video::findOrFail($vid);
        return view('users.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoStoreRequest $request, $id,$uid)
    {
        $video = Video::findOrFail($id);
        $video->update($request->all());
        return redirect()->route('user.video',$uid );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::destroy($id);
        return redirect()->back();
    }
}
