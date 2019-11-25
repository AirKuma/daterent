@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    變更密碼
  </div>
		<div class="card-block">
      @if($errors->has())
          <div class="alert alert-danger">
             @foreach ($errors->all() as $error)
                   {{ $error }} <br />
               @endforeach
           </div>
       @endif

       {!! Form::open(['route' => ['user.updateaccount', $user->id], 'method' => 'PATCH', 'role' => 'form']) !!}
         @if($myprofiledata->permissions == 1)
            {!! Form::hidden('admin', '1') !!}
         @endif
         <fieldset class="card-block">
                <div class="form-group row">
                    {!! Form::label('current_password', '當前密碼',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         {!! Form::password('current_password', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('newpassword', '新密碼',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::password('newpassword', ['class' => 'form-control']) !!}
                    </div>
                </div>
                   <div class="form-group row">
                    {!! Form::label('newpassword_confirmation', '確認密碼',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::password('newpassword_confirmation', ['class' => 'form-control']) !!}
                    </div>
                </div>
           <div class="form-group row">
             <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('確認變更', ['class' => 'btn btn-primary']) !!}
             </div>
           </div>  
          </fieldset>
          {!! Form::close() !!}

    </div>

  </div>
@endsection