<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ReportStoreRequest;
use App\Message;
use App\Report;
use App\User;
use Auth;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportStoreRequest $request,$id)
    {
        $class = array('圖片不實','投訢身材','工作態度','不合理收貴','性服務','其他');
        $user = User::findOrFail($id);

        $report = new Report;
        $report->content=$request->content;  
        $report->class=$request->class;   
        $report->user_id = Auth::user()->id;
        $report->rent_id = $user->rent()->first()->id;    
        $report->save();

        $message = new Message;
        $message->content='收到舉報！'."\n".'舉報類別：'.$class[$request->class]."\n".'舉報原因如下：'."\n\n".$request->content;    
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $id;    
        $message->visible=2;  
        $message->save();
        
        $users = User::where('permissions',1);
        $renter = User::where('id',$id);
        foreach ($users->get() as $receiver) {
            $message1 = new Message;
            $message1->sender_id =Auth::user()->id;
            $message1->receiver_id=$receiver->id;
            $message1->content=$renter->first()->name.'收到舉報！'."\n".'舉報類別：'.$class[$request->class]."\n".'舉報原因如下：'."\n\n".$request->content;
            $message1->visible=2;  
            $message1->save();  
        }
        return redirect()->route('rent.show',$id);
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
