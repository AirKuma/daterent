@extends('layouts.master')

@section('content')

 @if(Session::has('message3'))
 {!! Session::get('message3') !!}
 @endif

<div class="container">
      <div class="row">
        
      	<div class="card">
  <div class="card-header">
    聯絡我們
  </div>
		<div class="card-block">
<legend>聯絡資訊</legend> 	
		<table class="table" style="word-break: break-all;">
        <tr>
            <th scope="row" style="width:17%;">E-mail：</th>
            <td>daterent@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">聯絡電話：</th>
            <td>02-56545646</td>
          </tr>
          <tr>
            <th scope="row">廣告電話：</th>
            <td>02-56545646</td>
          </tr>
        </table> 
<hr>
	@if($errors->has())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                      {{ $error }} <br />
                  @endforeach
                </div>
    @endif

		<legend>發送E-mail</legend>
    	<fieldset class="card-block">
    {!! Form::open(['method' => 'POST', 'route' => 'contactus.title']) !!}
    <div class="form-group row">
            <label for="title" class="col-sm-2 form-control-label">聯絡主題：</label>
            <div class="col-sm-8">
            {!! Form::select('title', ['廣告查詢','發表意見'], null, ['class' => 'form-control']) !!}                   
          </div>     
          <div class="col-sm-2">
            {!! Form::submit('確認發送', ['class' => 'btn btn-primary']) !!}
          </div> 
   </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'POST', 'route' => 'contactus.send']) !!}
		<div class="form-group row">
			{!! Form::label('name', '姓名：',array('class' => 'col-sm-2 form-control-label')) !!} </p >
			<div class="col-sm-10">
				{!! Form::text('name', null,array('class' => 'form-control')) !!} </p >
			</div>	
		</div>

		<div class="form-group row">
			{!! Form::label('email', 'E-mail：',array('class' => 'col-sm-2 form-control-label')) !!} </p >
			<div class="col-sm-10">
				{!! Form::text('email', null,array('class' => 'form-control')) !!} </p >
			</div>
		</div>	

		<div class="form-group row">
			{!! Form::label('title', '主題：',array('class' => 'col-sm-2 form-control-label')) !!} </p >
			<div class="col-sm-10">
				{!! Form::text('title',$titlevalue[$title],array('class' => 'form-control')) !!} </p >
			</div>	
		</div>
		<div class="form-group row">
			{!! Form::label('contents', '內容：',array('class' => 'col-sm-2 form-control-label')) !!} </p >
		<div class="col-sm-10">
			{!! Form::textarea('contents',null,array('class' => 'form-control')) !!} </p >
		</div>
		</div>

		<div class="form-group row">
             <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('確認發送', ['class' => 'btn btn-primary']) !!}
                {!! Form::reset('重寫',array('class' => 'btn btn-primary')) !!}
             </div>
        </div> 

	</fieldset>

		{!! Form::close() !!}



    </div>
  </div>
      </div>
    </div> 
@endsection

@if(Session::has('send'))
<script language="javascript">
<!--
var alarm=alert("成功寄出!!");
-->
</script>

 @endif