@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">

<div class="card">
  <div class="card-header">
    出租評論
  </div>
		<div class="card-block">
      @if($errors->has())
          <div class="alert alert-danger">
             @foreach ($errors->all() as $error)
                   {{ $error }} <br />
               @endforeach
           </div>
       @endif

       {!! Form::open(['method' => 'POST', 'route' => ['comment.store', Request::segment(3)],'role' => 'form']) !!}
         <fieldset class="card-block">
          <div class="form-group row">
                    {!! Form::label('picture', '圖片真實性',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('picture', '20') !!} 極差
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">
                            {!! Form::radio('picture', '40') !!} 差 
                            <span class="c-indicator"></span>
                         </label>   
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('picture', '60') !!} 普通
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('picture', '80') !!} 好
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('picture', '100') !!} 極好
                            <span class="c-indicator"></span>
                         </label>   
                    </div>
                </div>
            <div class="form-group row">
                    {!! Form::label('figure', '身材評分',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('figure', '20') !!} 極差
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">
                            {!! Form::radio('figure', '40') !!} 差 
                            <span class="c-indicator"></span>
                         </label>   
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('figure', '60') !!} 普通
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('figure', '80') !!} 好
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('figure', '100') !!} 極好
                            <span class="c-indicator"></span>
                         </label>  
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('attitude', '工作態度',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('attitude', '20') !!} 極差
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">
                            {!! Form::radio('attitude', '40') !!} 差 
                            <span class="c-indicator"></span>
                         </label>   
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('attitude', '60') !!} 普通
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('attitude', '80') !!} 好
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('attitude', '100') !!} 極好
                            <span class="c-indicator"></span>
                         </label>   
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('fee', '合理收費',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('fee', '20') !!} 極差
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">
                            {!! Form::radio('fee', '40') !!} 差 
                            <span class="c-indicator"></span>
                         </label>   
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('fee', '60') !!} 普通
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('fee', '80') !!} 好
                            <span class="c-indicator"></span>
                         </label> 
                         <label class="checkbox-inline c-input c-radio">   
                            {!! Form::radio('fee', '100') !!} 極好
                            <span class="c-indicator"></span>
                         </label>   
                    </div>
                </div>
           <div class="form-group row">
             <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('確認發送', ['class' => 'btn btn-primary']) !!}
             </div>
           </div>  
          </fieldset>
          {!! Form::close() !!}

    </div>

  </div>
   </div>
    </div>
@endsection