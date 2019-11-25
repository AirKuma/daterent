<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rent;
use Carbon\Carbon;
use App\Message;
use Auth;

class AdminRentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents = Rent::orderBy('id')->paginate(2);
        $rentstatus = array("暫停出租", "出租中",'封鎖中');
        return view('admins.rent',compact('rents','rentstatus'));
    }

    public function ifrent_update(Request $request, $id)
    {
        $rent = Rent::findOrFail($id);
        $rent->ifrent = $request->ifrent;
        $rent->save();
        return redirect()->back();
    }

    public function block(Request $request, $id)
    {
        $rent = Rent::findOrFail($id);

        $block = $request->block;
        $releasedates = array('1', '2','6','12');
        $now = Carbon::now();

        $rent->ifrent = 2;
        $rent->releasedate = $now->addMonths($releasedates[$block]);
        $rent->save();

        $message = new Message;
        $message->content='出租已遭封鎖，在此期間禁止任何出租行為。';    
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $rent->user()->first()->id;   
        $message->visible=2;   
        $message->save();

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
