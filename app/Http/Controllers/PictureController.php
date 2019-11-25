<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Picture;
use App\User;
use App\Http\Requests\PictureStoreRequest;


class PictureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['allpicture']]);
        $this->middleware('user', ['except' => ['allpicture']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        $pictures = Picture::where('user_id','=',$user->id)->orderBy('created_at', 'desc')->paginate(2);
        return view('users.pictures.index',compact('pictures','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.pictures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,PictureStoreRequest $request)
    {
        $picture = new Picture;

        //return dd(\Input::file('picture'));
        $file = \Input::file('picture');
        $tmpFilePath = '/images/picture/';
        $tmpFileName = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
        $path = $tmpFilePath . $tmpFileName;
        $picture->picture = $path;

        $picture->describe = $request->describe;
        $picture->user_id = $id;
        $picture->save();

        return redirect()->route('user.picture', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allpicture($id)
    {
        $user = User::findOrFail($id);
        $pictures = Picture::where('user_id',$id)->get();
        return view('rents.picture',compact('pictures','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$pid)
    {
        $picture = Picture::findOrFail($pid);
        return view('users.pictures.edit',compact('picture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PictureStoreRequest $request, $id,$uid)
    {
        $picture = Picture::findOrFail($id);

         if(\Input::hasFile('picture')) {
            $file = \Input::file('picture');
            $tmpFilePath = '/images/picture/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $picture->picture = $path;
        }

        $picture->describe = $request->describe;
        $picture->save();
        
        return redirect()->route('user.picture',$uid );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Picture::destroy($id);
        return redirect()->back();
    }
}
