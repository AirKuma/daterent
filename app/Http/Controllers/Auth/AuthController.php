<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\ContactFormRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout','getActivateAccount', 'activateAccount','send_mail']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $activation_code = str_random(60) . $request->input('email');

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->height = $request->input('height');
        $user->weight = $request->input('weight');
        $user->nationality = $request->input('nationality');
        $user->city = $request->input('city');
        $user->degree = $request->input('degree');
        $user->careerclass = $request->input('careerclass');
        $user->career = $request->input('career');
        $user->introduction = $request->input('introduction');
        $user->ideal = $request->input('ideal');
        $user->activation_code = $activation_code;
        
        if($request->input('gender')==0)
            $user->image = "/images/default/man.png";
        else
            $user->image = "/images/default/woman.png";
        $user->save();

        //send mail
        $activate_url = route('user.activate.code', ['code' => $activation_code]);

        \Mail::send('emails.activate',
            array(
                'title' => "請點擊連結激活您的帳號",
                'contents' => $activate_url,
                'now' => \Carbon\Carbon::now()
            ), function($message)
        {
            $email_sender = \Request::input('email');
            $message->from('401violet@gmail.com');
            $message->to($email_sender, 'Daterent Administrator')->subject('系統通知: 請點以下連結激活您的帳號!');
        });

        return redirect($this->redirectPath())->with('register', '註冊成功！');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:8',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required',
            'birthday' => 'required|date',
            'height' => 'required|min:70|max:300|integer',
            'weight' => 'required|min:20|max:1000|integer',
            'nationality' => 'required',
            'city' => 'required|different:reg',
            'degree' => 'required',
            'careerclass' => 'required',
            'career' => 'required|max:50',
            'introduction' => 'required|max:255',
            'ideal' => 'required|max:150',
        ]);
    }
    public function messages()
    {
        return [
            'name.required'=>'請輸入暱稱',
            'name.max'=>'暱稱不能超過20個字',
            'class.required'=>'請選擇項目類別',
            'pre_amount.required'=>'請輸入預計募資金額',
            'pre_amount.numeric'=>'預計募資金額必須是數字',
            'pre_amount.min'=>'預計募資金額不能少於5000',
            'pre_amount.max'=>'預計募資金額不能超過99999999',
            'outline.required'=>'請輸入大綱內容',
            'outline.max'=>'大綱不能超過255個字',
            'start_date.required'=>'請選擇募資開始時間',
            'end_date.required'=>'請選擇募資結束時間',
            'cover_img_path.required'=>'請上傳項目封面',
            'cover_img_path.max'=>'項目封面大小不能超過1M',
            'video_link.required' =>'請填寫影片鏈接',
            'video_link.max' =>'影片鏈接不能超過100個字元',
            'content.required' =>'請填寫項目內容',
            
        ];
    }
    public function activateAccount($code, User $user)
    {

       if($user->accountIsActive($code)) {
            return "Success, your account has been activated.";
        }else{
            return "message', 'Your account couldn\'t be activated, please try again";
        }
    }


    public function getActivateAccount()
    {
        if(Auth::check()){
            if(Auth::user()->actived == 0){
                return view('auth.activate');

            }
        }
        return redirect('/');
    }

    public function send_mail(ContactFormRequest $request,$id)
    {
        $user = User::findOrFail($id);
        $activate_url = route('user.activate.code', ['code' => $user->activation_code]);

        \Mail::send('emails.activate',
            array(
                'title' => "請點擊連結激活您的帳號",
                'contents' => $activate_url,
                'now' => \Carbon\Carbon::now()
            ), function($message)
        {
            $email_sender = \Request::input('email');
            $message->from('401violet@gmail.com');
            $message->to($email_sender, 'Daterent Administrator')->subject('系統通知: 請點以下連結激活您的帳號!');
        });

        return redirect()->back()->with('send', '成功寄出');;
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
