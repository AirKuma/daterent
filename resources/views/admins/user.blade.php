@extends('layouts.admin')
@section('admin_content')
<div class="card">
  <div class="card-header">
    使用者管理
  </div>
	<div class="card-block">
		
<div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr> 
            <th style="width:5%;">ID</th>
            <th style="width:22%;">使用者</th>
            <th style="width:15%;">註冊時間</th>
            <th style="width:12%;">出租狀況</th>
            <th style="width:12%;">主頁連結</th>
            <th style="width:15%;">使用者狀態</th>
            <th style="width:5%;">操作</th>
            <th style="width:5%;"></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->created_at->format('Y-m-d H時') }}</td>
            <td>@if($user->rent()->first()==null)尚未出租@elseif($user->rent()->first()->ifrent==0)暫停出租@elseif($user->rent()->first()->ifrent==1)出租中@else 封鎖中@endif</td>
            <td><a href="{{ route('user.show', $user->id)}}">主頁連結</a></td>
            <td>{{ $permission[$user->permissions] }}</td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PermissionsModal-{{ $user->id }}" data-whatever="@mdo">權限</button>
            <!--更改權限modal-->
          <div class="modal fade" id="PermissionsModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">變更權限</h4>
                  </div>
                  <div class="modal-body">
                  {!! Form::model($user,['route' => ['admin.user.permissions', $user->id], 'method' => 'PATCH', 'role' => 'form']) !!}
                    <div class="form-group row">
                         {!! Form::label('permissions', '權限：',array('class' => 'col-sm-2 form-control-label')) !!}
                         <div class="col-sm-10">
                            {!! Form::select('permissions', ['一般使用者','管理員'], null, ['class' => 'form-control']) !!}
                         </div>      
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                    {!! Form::submit('確認更新', ['class' => 'btn btn-primary']) !!}
                  </div>
                  {!! Form::close() !!}

                </div>
              </div>
            </div>
            </td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BlockModal-{{ $user->id }}" data-whatever="@mdo">封鎖</button>
            <!--封鎖modal-->
          <div class="modal fade" id="BlockModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">封鎖</h4>
                  </div>
                  <div class="modal-body">
                  {!! Form::model($user,['route' => ['admin.user.block', $user->id], 'method' => 'PATCH', 'role' => 'form']) !!}
                    <div class="form-group row">
                         {!! Form::label('block', '釋放日期',array('class' => 'col-sm-2 form-control-label')) !!}
                         <div class="col-sm-10">
                            {!! Form::select('block', ['1個月後','3個月後','6個月後','1年後'], null, ['class' => 'form-control']) !!}                   
                         </div>      
                    </div>
            
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                    {!! Form::submit('確認封鎖', ['class' => 'btn btn-primary']) !!}
                  </div>
                  {!! Form::close() !!}

                </div>
              </div>
            </div>
            </td>
            <td>
                <a href="{{ route('create.message', $user->id )}}" class="btn btn-primary">短信</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
  	<center>{!! $users->render() !!}</center>
</div>
@endsection


