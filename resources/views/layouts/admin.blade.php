@extends('layouts.master')

@section('content')

<div class="container">
     <div class="row">
        <div class="col-md-2 list-group">
        <div class="list-group-item active" style="border:1px solid #ddd;">
          管理平台
        </div>
        <a href="{{ route('admin.user') }}" class="list-group-item {{ set_active('admin/user','list-group-item-danger') }}">使用者管理</a>
        <a href="{{ route('admin.rent') }}" class="list-group-item {{ set_active('admin/rent','list-group-item-danger') }}">出租管理</a>
        <!--<a href="{{ route('admin.request') }}" class="list-group-item {{ set_active('admin/request','list-group-item-danger') }}">出租要求管理</a>-->
        <a href="{{ route('admin.report') }}" class="list-group-item {{ set_active('admin/report','list-group-item-danger') }}">舉報管理</a>
        <a href="{{ route('admin.advertisement') }}" class="list-group-item {{ set_active('admin/advertisement','list-group-item-danger') }}">廣告管理</a>
        </div>
    <div class="col-md-10">
      @yield('admin_content')
    </div>
    </div>
</div> 

@endsection