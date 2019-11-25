@extends('layouts.master')

@section('content')

<div class="container">
     <div class="row">
        <div class="col-md-2 list-group">
        <div class="list-group-item active" style="border:1px solid #ddd;">
          個人空間
        </div>
        <a href="{{ route('user.show', Request::segment(3) )}}" class="list-group-item {{ set_active('user/show/*','list-group-item-danger') }}">用戶主頁</a>
        <a href="{{ route('user.follow', ['id' =>  Request::segment(3), 'step' => 1]) }}" class="list-group-item {{ set_active('user/follow/*','list-group-item-danger') }}">我的追蹤</a>
        <a href="{{ route('user.message', ['id' =>  Request::segment(3), 'step' => 1]) }}" class="list-group-item {{ set_active('user/message/*','list-group-item-danger') }}">訊息通知</a>
        <a href="{{ route('user.comment', ['id' =>  Request::segment(3), 'step' => 1]) }}" class="list-group-item {{ set_active('user/comment/*','list-group-item-danger') }}">我的評價</a>
        <!--<a href="{{ route('user.request', Request::segment(3) )}}" class="list-group-item {{ set_active('user/request/*','list-group-item-danger') }}">出租要求</a>-->
        <a href="{{ route('user.picture', Request::segment(3) )}}" class="list-group-item {{ set_active('user/picture/*','list-group-item-danger') }}">相片中心</a>
        <a href="{{ route('user.video', Request::segment(3) )}}" class="list-group-item {{ set_active('user/video/*','list-group-item-danger') }}">影片中心</a>

        <div class="list-group-item active" style="border:1px solid #ddd;">
          個人設置
        </div>
        <a href="{{ route('user.editaccount', Request::segment(3) )}}" class="list-group-item {{ set_active('user/editaccount/*','list-group-item-danger') }}">變更密碼</a>
        <a href="{{ route('user.editprofile', Request::segment(3) )}}" class="list-group-item {{ set_active('user/editprofile/*','list-group-item-danger') }}">基本資料修改</a>
        @if($user_data->rent()->first()!=null &&$user_data->rent()->first()->ifrent!=2)
        <a href="{{ route('user.editrent', Request::segment(3) )}}" class="list-group-item {{ set_active('user/editrent/*','list-group-item-danger') }}">出租設置</a>
        @endif
       </div>
    <div class="col-md-10">
      @yield('user_content')
    </div>
    </div>
</div> 

@endsection