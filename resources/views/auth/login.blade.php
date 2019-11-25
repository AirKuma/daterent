@extends('layouts.master')

@section('content')

    <div class="container">

      <!-- Example row of columns -->
        <div class="row">

                <h1>登入</h1><hr>

                @if($errors->has())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                      {{ $error }} <br />
                  @endforeach
                </div>  
                @endif
                <div role="form">
                {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}
                <fieldset class="card-block">
                    <div class="form-group row">
                    {!! Form::label('email', 'Email',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('email', null, ['class'=> 'form-control']) !!}
                    </div>
                    </div>
                    <div class="form-group row">
                    {!! Form::label('password', '密碼',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                         {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-2"></label>
                    <div class="checkbox">
                        <div class="col-sm-10">
                        <label class="checkbox-inline c-input c-radio">
                        {!! Form::checkbox('remember',null)!!}記住我
                        <span class="c-indicator"></span>
                        </label> 
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10">
     
                                {!! Form::submit('登入', ['class' => 'btn btn-primary']) !!}
                           
                           
                              <a href="/auth/register">點我註冊</a>
                           
                      </div>
                   </div>   
                </fieldset>   
                {!! Form::close() !!}  
                </div>
        </div>

    </div> <!-- /container -->

@endsection
