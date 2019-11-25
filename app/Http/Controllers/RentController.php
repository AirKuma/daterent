<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\RentStoreRequest;
use App\Rent;
use App\User;
use App\Picture;
use App\Video;
use Carbon\Carbon;
use Auth;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show','search']]);
        $this->middleware('userblock', ['only' => ['show']]);
        $this->middleware('user', ['except' => ['index','create','store','show','set','search']]);
        $this->middleware('rentcreate',['except' => ['index','show','edit','update','set','search']]);
        $this->middleware('rentblock',['except' => ['index','create','store','set','search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sort)
    {
        $gender = array("男生", "女生");
        $region = array('','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他');
        $longterm = array("否", "是");
        $nationality = array('臺灣','中國','香港','澳門','日本','韓國','俄羅斯','蒙古國','越南','寮國','柬埔寨','泰國','緬甸','菲律賓','新加坡','汶萊','印尼','東帝汶','馬來西亞','印度','不丹','孟加拉國','尼泊爾','巴基斯坦','斯里蘭卡','馬爾地夫','亞美尼亞','亞塞拜然','巴林','賽普勒斯','喬治亞','伊朗','伊拉克','以色列','約旦','科威特','黎巴嫩','阿曼','巴勒斯坦','卡達','沙烏地阿拉伯','敘利亞','阿聯','葉門','土耳其','哈薩克','吉爾吉斯','塔吉克','土庫曼','烏茲別克','阿富汗','俄羅斯','美國','加拿大','墨西哥','哥斯大黎加','古巴','格陵蘭','瓜地馬拉','宏都拉斯','尼加拉瓜','巴拿馬','其他北美洲國家','阿根廷','玻利維亞','巴西','智利','哥倫比亞','厄瓜多','福克蘭群島','法屬蓋亞那','蓋亞那','巴拉圭','秘魯','蘇利南','烏拉圭','委內瑞拉','英國','法國','愛爾蘭','荷蘭','比利時','盧森堡','摩納哥','澤西','根西','曼島','波蘭','瑞士','列支敦斯登','奧地利','匈牙利','捷克','斯洛伐克','斯洛維尼亞','德國','葡萄牙','西班牙','安道爾','希臘','義大利','聖馬利諾','馬爾他','梵蒂岡','保加利亞','羅馬尼亞','塞爾維亞','克羅埃西亞','波士尼亞與赫塞哥維納','蒙特內哥羅','阿爾巴尼亞','馬其頓','直布羅陀','丹麥','挪威','冰島','芬蘭','瑞典','法羅群島','布韋島','烏克蘭','白俄羅斯','立陶宛','拉脫維亞','愛沙尼亞','摩爾多瓦','澳洲','紐西蘭','其他大洋洲國家','南極洲國家','阿爾及利亞','中非','剛果','象牙海岸','埃及','衣索比亞','幾內亞','肯亞','摩洛哥','尼日','獅子山','南非','蘇丹','坦尚尼亞','烏干達','尚比亞','辛巴威','其他非洲國家');
        
        //判斷搜尋者性別做搜尋條件
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            if($user->gender==0){
                $sergen = 1;
                $requestgender = array('0','2');
            }
            else{
                $sergen = 0;
                $requestgender = array('1','2');
            }
        }
        else{
            $sergen = 0;
            $requestgender = array('0','1','2');
        }

        //搜尋
        if(\Request::input('gender')!=null)
            $gen = array(\Request::input('gender'));
        else
            $gen = array('0','1','2');
        if(\Request::input('region')==null || \Request::input('region')==0)
            $reg = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22');
        else
            $reg = array(\Request::input('region'));
        //age 
        if(\Request::input('ages')==null || \Request::input('ages')==0)
            $ages = -1;
        else   
            $ages = \Request::input('ages')+17;
        if(\Request::input('agee')==null || \Request::input('agee')==0)
            $agee = 100;
        else
            $agee = \Request::input('agee')+18;
        $now = Carbon::now();
        $agerenges = date("Y-m-d", strtotime($now."-".$ages."year"));
        $agerengee = date("Y-m-d", strtotime($now."-".$agee."year"));

        $countrys = \Input::get('nationality');
        if($countrys == null || \Request::input('country')==0)
            $countrys = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87','88','89','90','91','92','93','94','95','96','97','98','99','100','101','102','103','104','105','106','107','108','109','120','121','122','123','124','125','126','127','128','129','130','131','132','133','134','135','136','137','138','139','140','141','142','143','144','145','146','147');

        $name= \Request::input('name');

        //找出rent
        if($sort=='new')       
                 $rents = Rent::where('ifrent', '1')->Join('users', 'rents.user_id', '=', 'users.id')->whereIn('gender',$gen)->whereIn('city',$reg)->whereIn('requestgender',$requestgender)->where('birthday','<=',$agerenges)->where('birthday','>=',$agerengee)->whereIn('nationality',$countrys)->where('name', 'LIKE', '%'.$name.'%')->orderBy('rents.created_at', 'desc')->get();
        /*else if($sort=='favorites')
                $rents = Rent::where('ifrent', '1')->Join('users', 'rents.user_id', '=', 'users.id')->whereIn('gender',$gen)->whereIn('city',$reg)->whereIn('requestgender',$requestgender)->where('birthday','<=',$agerenges)->where('birthday','>=',$agerengee)->whereIn('nationality',$countrys)->where('name', 'LIKE', '%'.$name.'%')->distinct()->with('follows')->get()->sortBy(function($hackathon)
                {
                    return $hackathon->follows->count();
                })->reverse();*/
        else if($sort=='feer')
            $rents = Rent::where('ifrent', '1')->Join('users', 'rents.user_id', '=', 'users.id')->whereIn('gender',$gen)->whereIn('city',$reg)->whereIn('requestgender',$requestgender)->where('birthday','<=',$agerenges)->where('birthday','>=',$agerengee)->whereIn('nationality',$countrys)->where('name', 'LIKE', '%'.$name.'%')->orderBy('fee', 'desc')->get();
        else
            $rents = Rent::where('ifrent', '1')->Join('users', 'rents.user_id', '=', 'users.id')->whereIn('gender',$gen)->whereIn('city',$reg)->whereIn('requestgender',$requestgender)->where('birthday','<=',$agerenges)->where('birthday','>=',$agerengee)->whereIn('nationality',$countrys)->where('name', 'LIKE', '%'.$name.'%')->orderBy('fee', 'asc')->get();

        //搜尋變數
        $gen = \Request::input('gender');
        $reg = \Request::input('region');
        $ages = \Request::input('ages');
        $agee = \Request::input('agee');
        $cou = \Request::input('country');
        if($cou == null || $cou==0 || \Input::get('nationality')==null)
            $countrys = null;

        return view('rents.index',compact('rents','gender','region','gen','reg','cou','ages','agee','name','sort','longterm','nationality','sergen','countrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.createrent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentStoreRequest $request,$uid)
    {
        $rent = new Rent;
        $rent->phone=$request->phone;    
        $rent->facebook=$request->facebook;  
        $rent->youtube=$request->youtube;
        $rent->web=$request->web;
        $rent->line=$request->line;
        $rent->telegram=$request->telegram;  
        $rent->wechat=$request->wechat;
        $rent->Whatsapp=$request->Whatsapp;
        $rent->requestgender=$request->requestgender;
        $rent->fee=$request->fee;
        $rent->serviceaddress=$request->serviceaddress;
        $rent->servicetime=$request->servicetime;
        $rent->language=$request->language;
        $rent->bust=$request->bust;
        $rent->waistline=$request->waistline;
        $rent->hips=$request->hips;
        $rent->motto=$request->motto;
        if($request->haschild==null)
           $rent->haschild=0;
        else    
          $rent->haschild=$request->haschild;
        $rent->ifrent = 1;
        $rent->user_id = $uid;    
        $rent->save();
        
        return redirect()->route('user.editrent',$uid);
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
        $longterm = array("否", "是");
        $nationality = array('臺灣','中國','香港','澳門','日本','韓國','俄羅斯','蒙古國','越南','寮國','柬埔寨','泰國','緬甸','菲律賓','新加坡','汶萊','印尼','東帝汶','馬來西亞','印度','不丹','孟加拉國','尼泊爾','巴基斯坦','斯里蘭卡','馬爾地夫','亞美尼亞','亞塞拜然','巴林','賽普勒斯','喬治亞','伊朗','伊拉克','以色列','約旦','科威特','黎巴嫩','阿曼','巴勒斯坦','卡達','沙烏地阿拉伯','敘利亞','阿聯','葉門','土耳其','哈薩克','吉爾吉斯','塔吉克','土庫曼','烏茲別克','阿富汗','俄羅斯','美國','加拿大','墨西哥','哥斯大黎加','古巴','格陵蘭','瓜地馬拉','宏都拉斯','尼加拉瓜','巴拿馬','其他北美洲國家','阿根廷','玻利維亞','巴西','智利','哥倫比亞','厄瓜多','福克蘭群島','法屬蓋亞那','蓋亞那','巴拉圭','秘魯','蘇利南','烏拉圭','委內瑞拉','英國','法國','愛爾蘭','荷蘭','比利時','盧森堡','摩納哥','澤西','根西','曼島','波蘭','瑞士','列支敦斯登','奧地利','匈牙利','捷克','斯洛伐克','斯洛維尼亞','德國','葡萄牙','西班牙','安道爾','希臘','義大利','聖馬利諾','馬爾他','梵蒂岡','保加利亞','羅馬尼亞','塞爾維亞','克羅埃西亞','波士尼亞與赫塞哥維納','蒙特內哥羅','阿爾巴尼亞','馬其頓','直布羅陀','丹麥','挪威','冰島','芬蘭','瑞典','法羅群島','布韋島','烏克蘭','白俄羅斯','立陶宛','拉脫維亞','愛沙尼亞','摩爾多瓦','澳洲','紐西蘭','其他大洋洲國家','南極洲國家','阿爾及利亞','中非','剛果','象牙海岸','埃及','衣索比亞','幾內亞','肯亞','摩洛哥','尼日','獅子山','南非','蘇丹','坦尚尼亞','烏干達','尚比亞','辛巴威','其他非洲國家');

        $user = User::findOrFail($id);
        $user->hitpoint = $user->hitpoint+1;
        $user->save();

        $pictures = Picture::where('user_id',$id)->take(4)->get();
        $videos = Video::where('user_id',$id)->take(3)->get();

        $now = Carbon::now();
        $birthday = new Carbon($user->birthday);
        $age = $birthday->diff($now)->y;
        return view('rents.show',compact('user','gender','region','age','pictures','videos','longterm','nationality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rid = User::findOrFail($id)->rent()->first()->id;
        $rent = Rent::findOrFail($rid);
        return view('users.editrent',compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RentStoreRequest $request, $id)
    {
        $rent = Rent::findOrFail($id);
        $rent->update($request->all());
        if($request->haschild==null){
           $rent->haschild=0;
           $rent->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function set($id)
    {
        $rent = Rent::findOrFail($id);

        if($rent->ifrent==0)    
            $rent->ifrent = 1; 
        else
            $rent->ifrent = 0;
        $rent->save();
        
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }

    public function search($sort)
    {
        $gen = \Request::input('gender');
        $reg = \Request::input('region');

        return redirect()->route('rent.index',['sort' =>  $sort,'gen' =>  $gen, 'reg' => $reg]);
    }
}
