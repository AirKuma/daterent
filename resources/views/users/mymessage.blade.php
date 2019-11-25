@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    訊息通知
  </div>
<div class="card-block">  
<div class="card-deck-wrapper">
  <div class="card-deck">
  	<ul class="nav nav-tabs">
   <li class="nav-item">
    <a @if($step == 1){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="{{ route('user.message', ['id' =>  Request::segment(3), 'step' => 1]) }}">我收到的訊息</a>
  </li>
  <li class="nav-item">
    <a @if($step == 2){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="{{ route('user.message', ['id' =>  Request::segment(3), 'step' => 2]) }}">我發出的訊息</a>
  </li>
</ul>
<div class="card-block">
	@if($step == 1)
  @if($rmessages->count()==0)
      <h4>暫無訊息</h4>
    @else
      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:13%;">日期</th>
            <th style="width:19%;">寄信者</th>
            <th style="width:53%;">內容</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($rmessages as $message)
          <tr>
            <td>{{ $message->created_at }}</td>
            <td><a href="{{ route('rent.show',$message->sender()->first()->id) }}">{{ $message->sender()->first()->name }}</a></td>
            <td>{!! nl2br(e($message->content)) !!}</td>
            <td><a href="{{ route('destroy.message', $message->id)}}">刪除</a></td>
            <td><a href="{{ route('create.message', $message->sender()->first()->id)}}">回覆</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
    @endif

    @if($step == 2)
    @if($smessages->count()==0)
      <h4>暫無訊息</h4>
    @else
      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:13%;">日期</th>
            <th style="width:19%;">收信者</th>
            <th style="width:57%;">內容</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($smessages as $message)
          <tr>
            <td>{{ $message->created_at }}</td>
            <td><a href="{{ route('rent.show',$message->receiver()->first()->id) }}">{{ $message->receiver()->first()->name }}</a></td>
            <td>{!! nl2br(e($message->content)) !!}</td>
            <td><a href="{{ route('destroy.message',$message->id) }}">刪除</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div> 
    @endif
    @endif
     </div>

  </div>
  </div>
</div>
@if($step == 1)
<center>{!! $rmessages->render() !!}</center>
@else
<center>{!! $smessages->render() !!}</center>
@endif

</div>
@endsection


@if(Session::has('message'))
<script language="javascript">
<!--
var alarm=alert("此帳號已遭封鎖!!");
-->
</script>

 @endif