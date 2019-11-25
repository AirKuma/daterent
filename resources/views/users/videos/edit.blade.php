@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    修改影片
  </div>
		<div class="card-block">
      @if($errors->has())
          <div class="alert alert-danger">
             @foreach ($errors->all() as $error)
                   {{ $error }} <br />
               @endforeach
           </div>
       @endif

       {!! Form::model($video,['route' => ['video.update', $video->id,Request::segment(3)], 'method' => 'PATCH', 'role' => 'form']) !!}
         {!! Form::hidden('reg', '0') !!} 
                <fieldset class="card-block">
                <div class="form-group row">
                    {!! Form::label('video', 'Youtube連結',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::text('video',null,array('class' => 'form-control')) !!} </p >
                    <p class="help-block">請填寫嵌入程式碼網址。</p>
                    </div>      
                </div>
                <div class="form-group row">
                    {!! Form::label('describe', '影片描述',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::textarea('describe',null,array('class' => 'form-control')) !!} </p >
                    <p class="help-block">上限150個字，非必填欄位。</p>
                    </div>      
                </div>
            <div class="form-group row">
             <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('確認修改', ['class' => 'btn btn-primary']) !!}
              </div>
           </div>   
                </fieldset>
                {!! Form::close() !!}

    </div>

  </div>
@endsection