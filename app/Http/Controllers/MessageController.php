<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\MessageStoreRequest;
use App\Message;
use App\User;
use Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userblock', ['except' => ['index','destroy']]);
        $this->middleware('user', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$step)
    {
        $rmessages = Message::orderBy('created_at', 'desc')->where('receiver_id',$id)->whereIn('visible',[2,3])->paginate(2);
        $smessages = Message::orderBy('created_at', 'desc')->where('sender_id',$id)->whereIn('visible',[1,3])->paginate(2);
        return view('users.mymessage',compact('step','rmessages','smessages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageStoreRequest $request,$id)
    {
        $message = new Message;
        $message->content=$request->content;  
        $message->visible=3;    
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $id;    
        $message->save();
        
        return redirect()->route('user.message',['id' =>  Auth::user()->id, 'step' => 2]);
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
        $message = Message::findOrFail($id);
        if($message->visible==3){
            if($message->sender()->first()->id==Auth::user()->id&&$message->receiver()->first()->id==Auth::user()->id)
                $message->visible = 0;
            else if($message->sender()->first()->id==Auth::user()->id)
                $message->visible = 2;
            else
                $message->visible = 1;
        }
        else
            $message->visible = 0;
        $message->save();

        return redirect()->back();
    }
}
