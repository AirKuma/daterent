@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">

<div class="card">
  <div class="card-header">
    發送訊息
  </div>
		<div class="card-block">
      @if($errors->has())
          <div class="alert alert-danger">
             @foreach ($errors->all() as $error)
                   {{ $error }} <br />
               @endforeach
           </div>
       @endif

       {!! Form::open(['method' => 'POST', 'route' => ['message.store', Request::segment(3)],'role' => 'form']) !!}
         <fieldset class="card-block">
                <div class="form-group row">
                    {!! Form::label('content', '訊息內容',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         {!! Form::textarea('content',null,array('class' => 'form-control')) !!}
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