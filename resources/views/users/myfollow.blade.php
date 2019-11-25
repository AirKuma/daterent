@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    我的追蹤
  </div>
<div class="card-block">  
<div class="card-deck-wrapper">
  <div class="card-deck">
  	<ul class="nav nav-tabs">
  <li class="nav-item">
    <a @if($step == 1){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="{{ route('user.follow', ['id' =>  Request::segment(3), 'step' => 1]) }}">我追蹤的人</a>
  </li>
  <li class="nav-item">
    <a @if($step == 2){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="{{ route('user.follow', ['id' =>  Request::segment(3), 'step' => 2]) }}">追蹤我的人</a>
  </li>
</ul>

	@if($step == 1)
		<div class="card-block">
  @if($mfollow->count()==0)
      <h4>暫無追蹤</h4>
    @else
   	@foreach($mfollow as $follow)
  	<div class="col-sm-3">
    <div class="card">
      <img class="img-rounded card-img-top img-responsive" style="width: 100%;" src="{{ $follow->gfollow()->first()->image }}" data-src="holder.js/100%x200/" alt="Card image cap">
      <div class="card-block">
        <a href="{{ route('rent.show',$follow->gfollow()->first()->id) }}" class="card-text"><center>{{ $follow->gfollow()->first()->name }}</center></a>
        <div class="card-block">
        <a href="{{ route('follow.destroy',$follow->id) }}" class="btn btn-primary btn-block">取消追蹤</a>
    	</div>
      </div>
      </div>
      </div>
     @endforeach 
     </div>
     @endif
    </div>
    @endif

    @if($step == 2)
    	<div class="card-block">
     @if($gfollow->count()==0)
      <h4>暫無追蹤</h4>
    @else
   	@foreach($gfollow as $follow)
  	<div class="col-sm-3">
    <div class="card">
      <img class="img-rounded card-img-top img-responsive" style="width: 100%;" src="{{ $follow->mfollow()->first()->image }}" data-src="holder.js/100%x200/" alt="Card image cap">
      <div class="card-block">
        <a href="{{ route('rent.show',$follow->mfollow()->first()->id) }}" class="card-text"><center>{{ $follow->mfollow()->first()->name }}</center></a>
        <div class="card-block">
        <a href="@if(Auth::user()->follow()->where('follow_id',$follow->mfollow()->first()->id)->first()==null){{ route('follow.store',$follow->mfollow()->first()->id) }}@else{{ route('follow.destroy',$mfollow->where('follow_id',$follow->mfollow()->first()->id)->first()->id) }}@endif" class="btn btn-primary btn-block">@if(Auth::user()->follow()->where('follow_id',$follow->mfollow()->first()->id)->first()==null)我要追蹤@else取消追蹤@endif</a>
    	</div>
      </div>
      </div>
      </div>
     @endforeach 
     </div>
   @endif
   @endif

  </div>
  </div>
  @if($step == 1)
<center>{!! $mfollow->render() !!}</center>
@else
<center>{!! $gfollow->render() !!}</center>
@endif
</div>
</div>
@endsection

@if(Session::has('message'))
<script language="javascript">
<!--
var alarm=alert("此帳號已遭封鎖!!");
-->
</script>

 @endif