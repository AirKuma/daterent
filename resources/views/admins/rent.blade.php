@extends('layouts.admin')
@section('admin_content')
<div class="card">
  <div class="card-header">
    出租管理
  </div>
	<div class="card-block">
		
<div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr> 
            <th style="width:5%;">ID</th>
            <th style="width:20%;">使用者</th>
            <th style="width:12%;">出租狀況</th>
            <th style="width:13%;">出租主頁</th>
            <th style="width:13%;">操作</th>
            <th style="width:10%;"></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($rents as $rent)
          <tr>
            <td>{{ $rent->id }}</td>
            <td>{{ $rent->user()->first()->name }}</td>
            <td>{{ $rentstatus[$rent->ifrent] }}</td>
            <td><a href="{{ route('rent.show', $rent->user()->first()->id)}}">主頁連結</a></td>
            <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#IfrentModal-{{ $rent->id }}" data-whatever="@mdo">變更出租狀態</button>
            <!--更改權限modal-->
          <div class="modal fade" id="IfrentModal-{{ $rent->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">變更出租狀態</h4>
                  </div>
                  <div class="modal-body">
                  {!! Form::model($rent,['route' => ['admin.rent.ifrent', $rent->id], 'method' => 'PATCH', 'role' => 'form']) !!}
                    <div class="form-group row">
                         {!! Form::label('ifrent', '出租狀態',array('class' => 'col-sm-2 form-control-label')) !!}
                         <div class="col-sm-10">
                            {!! Form::select('ifrent', ['暫停出租','出租中'], null, ['class' => 'form-control']) !!}
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
            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BlockModal-{{ $rent->id }}" data-whatever="@mdo">封鎖</button>
            <!--封鎖modal-->
          <div class="modal fade" id="BlockModal-{{ $rent->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  {!! Form::model($rent,['route' => ['admin.rent.block', $rent->id], 'method' => 'PATCH', 'role' => 'form']) !!}
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RentUserModal-{{ $rent->id }}" data-whatever="@mdo">出租者</button>
            <!--誰租了modal-->
          <div class="modal fade" id="RentUserModal-{{ $rent->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">出租者</h4>
                  </div>
                  <div class="modal-body">
                      @if($rent->rentusers()->first()==null)
                        暫無出租者
                      @else
                      <table class="table" style="word-break: break-all;">
                        <thead class="thead-inverse">
                          <tr>
                            <th style="width:40%;">日期</th>
                            <th style="width:60%;">出租人</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($rent->rentusers()->get() as $rentuser)
                            <tr>
                              <td>{{ $rentuser->created_at }}</td>
                              <td>{{ $rentuser->user()->first()->name }}</td>
                            </tr>
                          @endforeach
                      </tbody>
                       </table> 
                      @endif  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                  </div>
                </div>
              </div>
            </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
  	<center>{!! $rents->render() !!}</center>
</div>
@endsection