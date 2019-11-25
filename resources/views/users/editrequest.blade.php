@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    修改出租要求
  </div>
		<div class="card-block">
      @if($errors->has())
          <div class="alert alert-danger">
             @foreach ($errors->all() as $error)
                   {{ $error }} <br />
               @endforeach
           </div>
       @endif

       {!! Form::model($requestrent,['route' => ['request.update', $requestrent->id,Request::segment(3)], 'method' => 'PATCH', 'role' => 'form']) !!}
         {!! Form::hidden('reg', '0') !!} 
                <fieldset class="card-block">
                <div class="form-group row">
                    {!! Form::label('title', '主題',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('title', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('gender', '性別要求',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         <label class="checkbox-inline c-input c-radio">
                            {!! Form::radio('gender', '0') !!} 男性 
                            <span class="c-indicator"></span>
                         </label>   
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('gender', '1') !!} 女性
                            <span class="c-indicator"></span>
                         </label>   
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('region', '招聘城市',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::select('region', ['選擇地區','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他'], null, ['class' => 'form-control']) !!}                   
                    </div>      
                </div>
                <div class="form-group row">
                    {!! Form::label('reward', '報酬',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('reward', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('content', '詳細內容',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::textarea('content',null,array('class' => 'form-control')) !!} </p >
                    <p class="help-block">上限255個字。</p>
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