<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function contactus()
    {
        $title = \Request::input('title');
        if($title==null)
            $title=2;
        $titlevalue = array('廣告查詢','發表意見','');
        return view('contactus',compact('title','titlevalue'));
    }

    public function send_mail(ContactFormRequest $request)
    {
        $email_sender = $request->email;

        \Mail::send('emails.contactus',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'title' => $request->title,
                'contents' => $request->contents,
                'now' => \Carbon\Carbon::now()
            ), function($message)
        {
            $message->from('401violet@gmail.com');
            $message->to('401violet@gmail.com', 'Daterent Administrator')->subject('系統通知: 有使用者聯絡我們!');
        });

        return redirect()->back()->with('send', '成功寄出');;
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
    public function title(Request $request)
    {
        $title = \Request::input('title');
        $titlevalue = array('國中','高中/高職','五專','大學/技術學院','碩士','博士');
        return redirect()->route('contactus',compact('title','titlevalue'));
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
