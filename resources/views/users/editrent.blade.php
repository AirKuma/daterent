@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    出租設置
  </div>
	<div class="card-block">
        <a href="{{ route('rent.set',$rent->id) }}" class="btn btn-primary">@if($rent->ifrent==0)繼續出租@else取消出租@endif</a>
		@if($errors->has())<br><br>
                <div class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                      {{ $error }} <br />
                  @endforeach
                </div>
                @endif

                {!! Form::model($rent,['route' => ['rent.update', $rent->id], 'method' => 'PATCH', 'role' => 'form']) !!}
                <fieldset class="card-block">
                <legend>聯絡資料</legend>
                 <div class="form-group row">
                    {!! Form::label('phone', '*連絡電話',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('phone', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('facebook', '*facebook連結',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('facebook', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('youtube', '*youtube連結',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('youtube', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('web', '個人網頁連結',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('web', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('line', 'line',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('line', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('telegram', 'telegram',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('telegram', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('wechat', 'wechat',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('wechat', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('Whatsapp', 'Whatsapp',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('Whatsapp', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
            </fieldset>
            <fieldset class="card-block">
            <legend>其他資訊</legend>
            <div class="form-group row">
                    {!! Form::label('requestgender', '*出租要求性別',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('requestgender', '2') !!} 全部
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">
                            {!! Form::radio('requestgender', '0') !!} 男性 
                            <span class="c-indicator"></span>
                         </label>   
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('requestgender', '1') !!} 女性
                            <span class="c-indicator"></span>
                         </label>   
                    </div>
                </div>
            <div class="form-group row">
                    {!! Form::label('fee', '*收費',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                            {!! Form::number('fee', null, ['class'=> 'form-control']) !!}
                            <span class="input-group-addon">每小時</span>
                        </div>
                        <p class="help-block">依小時計費。</p>
                    </div>      
            </div>
                 <div class="form-group row">
                    {!! Form::label('serviceaddress', '*服務地址',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('serviceaddress', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('servicetime', '*服務時間',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('servicetime', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('language', '*使用語言',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('language', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('bust', '*胸圍',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        <div class="input-group">
                            {!! Form::number('bust', null, ['class'=> 'form-control']) !!}
                            <span class="input-group-addon">英吋</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('waistline', '*腰圍',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        <div class="input-group">
                            {!! Form::number('waistline', null, ['class'=> 'form-control']) !!}
                            <span class="input-group-addon">英吋</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('hips', '*臀圍',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        <div class="input-group">
                            {!! Form::number('hips', null, ['class'=> 'form-control']) !!}
                            <span class="input-group-addon">英吋</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('motto', '座右銘',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('motto', null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('haschild', '有無孩子',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        <label class="c-input c-checkbox">
                            {!! Form::checkbox('haschild', '1') !!}  
                            <span class="c-indicator"></span>
                            我有孩子
                        </label>    
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