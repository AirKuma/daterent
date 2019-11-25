@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    新增相片
  </div>
        <div class="card-block">
    @if($errors->has())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                      {{ $error }} <br />
                  @endforeach
                </div>
                @endif

                {!! Form::open(['method' => 'POST', 'route' => ['picture.store', Request::segment(3)],'role' => 'form','files'=>true]) !!}
                <fieldset class="card-block">
                    <div class="form-group row">
                    {!! Form::label('picture', '選取圖片',array('class' => 'col-sm-2 form-control-label')) !!}
                    <label class="file">
                      <div class="col-sm-10">
                    {!! Form::file('picture', array('class'=> 'form-control','id' => 'file','onchange'=>'readURL(this);')) !!}
                    <span class="file-custom" style="margin-left:15px;"></span>
                    </div>
                    </label>
                </div>
                <div class="form-group row">  
                    {!! Form::label('img', '預覽圖片',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    <div id="image_preview" ><img height="auto" width="30%" id="previewing" src="/images/default/nodefaultimg.gif" /></div>               
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('describe', '圖片描述',array('class' => 'col-sm-2 form-control-label')) !!}
                    <div class="col-sm-10">
                    {!! Form::textarea('describe',null,array('class' => 'form-control')) !!} </p >
                    <p class="help-block">上限150個字，非必填欄位。</p>
                    </div>      
                </div>
            <div class="form-group row">
             <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('確認新增', ['class' => 'btn btn-primary']) !!}
              </div>
           </div>   
                </fieldset>
                {!! Form::close() !!}
    </div>

  </div>
@endsection

<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#previewing').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>