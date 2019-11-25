<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Advertisement;
use App\Http\Requests\AdvertisementStoreRequest;

class AdminAdController extends Controller
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
        $advertisements = Advertisement::orderBy('id')->paginate(3);
        return view('admins.advertisements.index',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementStoreRequest $request)
    {
        $advertisement = new Advertisement;

        $file = \Input::file('imageurl');
        $tmpFilePath = '/images/advertisement/';
        $tmpFileName = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
        $path = $tmpFilePath . $tmpFileName;
        $advertisement->imageurl = $path;

        $advertisement->advertiser = $request->advertiser;
        $advertisement->navigateurl = $request->navigateurl;
        $advertisement->describe = $request->describe;
        $advertisement->save();

        return redirect()->route('admin.advertisement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admins.advertisements.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admins.advertisements.edit',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementStoreRequest $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);

         if(\Input::hasFile('imageurl')) {
            $file = \Input::file('imageurl');
            $tmpFilePath = '/images/advertisement/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $advertisement->imageurl = $path;
        }

        
        $advertisement->advertiser = $request->advertiser;
        $advertisement->navigateurl = $request->navigateurl;
        $advertisement->describe = $request->describe;
        $advertisement->save();
        
        return redirect()->route('admin.advertisement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advertisement::destroy($id);
        return redirect()->back();
    }
}
