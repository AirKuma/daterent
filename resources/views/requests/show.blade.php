@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">
<div class="card">
  <div class="card-header">
    出租要求
  </div>
  <div class="row">
 	 <div class="col-sm-3">
 	 	<div class="card-block">  
		  	<img class="img-rounded card-img-top img-responsive" style="width: 100%;" src="{{ $request->user()->first()->image }}" data-src="holder.js/100%x180/?text=Image cap" alt="Card image cap">

		</div>
		 <div class="card-block">  
		    <h4 class="card-text"><a href="{{ route('rent.show',$request->user()->first()->id) }}"><center>{{ $request->user()->first()->name }}</center></a></h4><br>
			<a href="{{ route('create.message', $request->user()->first()->id )}}" class="btn btn-primary">回覆</a>
		</div>	
	</div>	
	<div class="col-sm-8">
		    <div class="table-responsive">
		    <table class="table" style="word-break: break-all;">
			    <tr>
			      <th scope="row" style="width:17%;">主旨</th>
			      <td>{{ $request->title }}</td>
			    </tr>
			    <tr>
			      <th scope="row" style="width:17%;">性別要求</th>
			      <td>{{ $gender[$request->gender] }}</td>
			    </tr>
			    <tr>
			      <th scope="row" style="width:17%;">招聘城市</th>
			      <td>{{ $region[$request->region] }}</td>
			    </tr>
			    <tr>
			      <th scope="row" style="width:17%;">報酬</th>
			      <td>{{ $request->reward }}</td>
			    </tr>
			    <tr>
			      <th scope="row" style="width:17%;">詳細內容</th>
			      <td>{!! nl2br(e($request->content)) !!}</td>
			    </tr>
			    </table>
			</div>
	</div>	
  </div>
</div>
</div>
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