<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AccountStoreRequest;
use App\Http\Requests\ProfileStoreRequest;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
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
        $user = User::findOrFail($id);
        $gender = array("男生", "女生");
        $region = array('','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他');
        $degree = array('國中','高中/高職','五專','大學/技術學院','碩士','博士');
        $careerclass = array('一般職業','農牧業','漁業','林材森林業','礦業採石業','交通運輸業','餐旅業','建築工程業','製造業','新聞廣告業','衛生保健業','娛樂業','文教機構','宗教團體','公共事業','一般商業','服務業','家庭管理','治安人員','軍人','資訊業','職業運動人員','其他');
        $nationality = array('臺灣','中國','香港','澳門','日本','韓國','俄羅斯','蒙古國','越南','寮國','柬埔寨','泰國','緬甸','菲律賓','新加坡','汶萊','印尼','東帝汶','馬來西亞','印度','不丹','孟加拉國','尼泊爾','巴基斯坦','斯里蘭卡','馬爾地夫','亞美尼亞','亞塞拜然','巴林','賽普勒斯','喬治亞','伊朗','伊拉克','以色列','約旦','科威特','黎巴嫩','阿曼','巴勒斯坦','卡達','沙烏地阿拉伯','敘利亞','阿聯','葉門','土耳其','哈薩克','吉爾吉斯','塔吉克','土庫曼','烏茲別克','阿富汗','俄羅斯','美國','加拿大','墨西哥','哥斯大黎加','古巴','格陵蘭','瓜地馬拉','宏都拉斯','尼加拉瓜','巴拿馬','其他北美洲國家','阿根廷','玻利維亞','巴西','智利','哥倫比亞','厄瓜多','福克蘭群島','法屬蓋亞那','蓋亞那','巴拉圭','秘魯','蘇利南','烏拉圭','委內瑞拉','英國','法國','愛爾蘭','荷蘭','比利時','盧森堡','摩納哥','澤西','根西','曼島','波蘭','瑞士','列支敦斯登','奧地利','匈牙利','捷克','斯洛伐克','斯洛維尼亞','德國','葡萄牙','西班牙','安道爾','希臘','義大利','聖馬利諾','馬爾他','梵蒂岡','保加利亞','羅馬尼亞','塞爾維亞','克羅埃西亞','波士尼亞與赫塞哥維納','蒙特內哥羅','阿爾巴尼亞','馬其頓','直布羅陀','丹麥','挪威','冰島','芬蘭','瑞典','法羅群島','布韋島','烏克蘭','白俄羅斯','立陶宛','拉脫維亞','愛沙尼亞','摩爾多瓦','澳洲','紐西蘭','其他大洋洲國家','南極洲國家','阿爾及利亞','中非','剛果','象牙海岸','埃及','衣索比亞','幾內亞','肯亞','摩洛哥','尼日','獅子山','南非','蘇丹','坦尚尼亞','烏干達','尚比亞','辛巴威','其他非洲國家');
        $longterm = array("否", "是");
        $requestgender = array("男生","女生","全部");
        $haschild = array("否", "是");
        return view('users.show',compact('user','gender','region','degree','careerclass','nationality','longterm','requestgender','haschild'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editaccount($id)
    {
        $user = User::findOrFail($id);
        return view('users.editaccount',compact('user'));
    }

    public function editprofile($id)
    {
        $user = User::findOrFail($id);
        return view('users.editprofile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateaccount($id, AccountStoreRequest $request)
    {
        $user = User::findOrFail($id);
        $auth = User::findOrFail(Auth::user()->id);

        if(!\Hash::check($request->current_password, $user->password)&&$auth->permissions!=1){
            return redirect()->back()->withErrors(['當前密碼錯誤']);   
        }

        $user->password = \Hash::make($request->newpassword);
        $user->save();

        if($auth->permissions==1)
            return redirect()->back();
        else{
            Auth::logout();
            return view('auth.login');
        }
        //return redirect()->route('user.editaccount', $user->id);
    }
    public function updateprofile($id, ProfileStoreRequest $request)
    {
        $user = User::findOrFail($id);

        if(\Input::hasFile('image')) {
            $file = \Input::file('image');
            $tmpFilePath = '/images/avatar/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
            $user->image = $path;
            $user->save();

            return redirect()->back();
        }
        else{
            $user->update($request->all());
            return redirect()->route('user.editprofile', $user->id);
        }
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
