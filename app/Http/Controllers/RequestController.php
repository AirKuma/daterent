<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\RequestStoreRequest;
use App\RentRequest;
use App\User;
use Auth;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show','search']]);
        $this->middleware('user', ['except' => ['index','create','store','show','destroy','search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gen,$reg)
    {
        $gender = array("男生", "女生");
        $region = array('','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他');

        if($gen==3)
            $requests = RentRequest::orderBy('created_at', 'desc')->whereHas('user', function($q)
            {
                $q->where('permissions', '<', '2');
            })->paginate(2);
        else{
            if($reg==0)
                $requests = RentRequest::where('gender',$gen)->orderBy('created_at', 'desc')->whereHas('user', function($q)
                {
                    $q->where('permissions', '<', '2');
                })->paginate(2);
            else
                $requests = RentRequest::where('gender',$gen)->where('region',$reg)->orderBy('created_at', 'desc')->whereHas('user', function($q)
                {
                    $q->where('permissions', '<', '2');
                })->paginate(2);
        }

        return view('requests.index',compact('requests','gender','region'));
        //return dd($gen);
    }

    public function userindex($id)
    {
        $user = User::find($id);
        $gender = array("男生", "女生");
        $region = array('','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他');
        $requests = RentRequest::where('user_id','=',$user->id)->orderBy('created_at', 'desc')->paginate(2);
        return view('users.myrequest',compact('requests','gender','region','user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responseuser.request
     */
    public function store(RequestStoreRequest $request)
    {
        $requestrent = new RentRequest($request->all());
        Auth::user()->requests()->save($requestrent);
        
        return redirect()->route('request.show',$requestrent->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gender = array("男生", "女生");
        $region = array('','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他');
        $request = RentRequest::find($id);
        return view('requests.show',compact('request','gender','region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$rid)
    {
        $requestrent = RentRequest::findOrFail($rid);
        return view('users.editrequest',compact('requestrent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreRequest $request, $id,$uid)
    {
        $requestrent = RentRequest::findOrFail($id);
        $requestrent->update($request->all());
        return redirect()->route('user.request',$uid );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$uid)
    {
        RentRequest::destroy($id);
        return redirect()->route('user.request',$uid );
    }

    public function search()
    {
        $gen = \Request::input('gender');
        $reg = \Request::input('region');

        return redirect()->route('request.index',['gen' =>  $gen, 'reg' => $reg]);
    }
}
