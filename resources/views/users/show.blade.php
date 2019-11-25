@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    用戶主頁
    @if($user->rent()->first()!=null)
    @if($user->rent()->first()->motto!=null)
    <div class="pull-xs-right" style="color:grey;font-size:13px;">{{ $user->rent()->first()->motto }}</div>
    @endif
    @endif
  </div>
  <div class="row">
 	 <div class="col-sm-3">
 	 	<div class="card-block">  
		  	<img class="img-rounded card-img-top img-responsive" style="width: 100%;" src="{{ $user->image }}" data-src="holder.js/100%x180/?text=Image cap" alt="Card image cap">
		  	<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ImgModal" data-whatever="@mdo">更新頭像</button>

		</div>
		 <div class="card-block">  
		    <h5 class="card-text"><center>{{ $user->name }}</center></h5><br>
		    <h6>造訪人數:{{ $user->hitpoint }}人</h6>
			<h6>追蹤人數:{{ $user->follows()->where('follow_id',$user->id)->count() }}人</h6>
		</div>	
		@if($user->rent()->first()==null)
		<div class="card-block">
			<a href="{{ route('rent.create',Request::segment(3)) }}" class="btn btn-primary btn-block">我要出租</a>
		</div>
		@endif
	</div>	
	<div class="col-sm-8">
		    <div class="table-responsive">
			  <table class="table" style="word-break: break-all;">
				<tr>
			      <th scope="row" style="width:17%;">性別</th>
			      <td style="width:33%;">{{ $gender[$user->gender] }}</td>
			      <th scope="row" style="width:17%;">生日</th>
			      <td>{{ $user->birthday }}</td>
			    </tr>
			    <tr>
			      <th scope="row">身高</th>
			      <td>{{ $user->height }} 公分</td>
			     <th scope="row">體重</th>
			      <td>{{ $user->weight }} 公斤</td>
			    </tr>
			    <tr>
			      <th scope="row">國籍</th>
			      <td>{{ $nationality[$user->nationality] }}</td>
			      <th scope="row">所在城市</th>
			      <td>{{ $region[$user->city] }}</td>
			    </tr>
			    <tr>
			      <th scope="row">學歷</th>
			      <td>{{ $degree[$user->degree] }}</td>
			      <th scope="row">職業類別</th>
			      <td>{{ $careerclass[$user->careerclass] }}</td>
			    </tr>
			  </table>  
			  <table class="table" style="word-break: break-all;">
			  	<tr>
			      <th scope="row" style="width:17%;">職業</th>
			      <td>{{ $user->career }}</td>
			    </tr>
			    <tr>
			      <th scope="row">自我介紹</th>
			      <td>{!! nl2br(e($user->introduction )) !!}</td>
			    </tr>
			    <tr>
			      <th scope="row">理想對象</th>
			      <td>{{ $user->ideal }}</td>
			    </tr>
			    </table>
			</div>
	</div>	
  </div>
</div>  
  @if($user->rent()->first()!=null)
<!--聯絡資訊-->
<div class="card">
  <div class="card-header">
    聯絡資訊
  </div>
    <div class="card-block">
    <table class="table" style="word-break: break-all;">
			    <tr>
			      <th scope="row" style="width:30%;">手機</th>
			      <td>{{ $user->rent()->first()->phone }}</td>
			    </tr>
			    <tr>
			      <th scope="row">E-mail</th>
			      <td>{{ $user->email }}</td>
			    </tr>
			      <tr>
			      <th scope="row">Facebook連結</th>
			      <td><a href="{{ $user->rent()->first()->facebook }}">{{ $user->rent()->first()->facebook }}</a></td>
			    </tr>
			    <tr>
			      <th scope="row">Youtube連結</th>
			      <td><a href="{{ $user->rent()->first()->youtube }}">{{ $user->rent()->first()->youtube }}</a></td>
			    </tr>
			    @if($user->rent()->first()->web!=null)
			    <tr>
			      <th scope="row">個人網站連結</th>
			      <td><a href="{{ $user->rent()->first()->web }}">{{ $user->rent()->first()->web }}</a></td>
			    </tr>
			    @endif
			    @if($user->rent()->first()->line!=null)
			    <tr>
			      <th scope="row">line</th>
			      <td>{{ $user->rent()->first()->line }}</td>
			    </tr>
			    @endif
			    @if($user->rent()->first()->telegram!=null)
			    <tr>
			      <th scope="row">telegram</th>
			      <td>{{ $user->rent()->first()->telegram }}</td>
			    </tr>
			    @endif
			    @if($user->rent()->first()->wechat!=null)
			    <tr>
			      <th scope="row">wechat</th>
			      <td>{{ $user->rent()->first()->wechat }}</td>
			    </tr>
			    @endif
			    @if($user->rent()->first()->Whatsapp!=null)
			    <tr>
			      <th scope="row">Whatsapp</th>
			      <td>{{ $user->rent()->first()->Whatsapp }}</td>
			    </tr>
			    @endif

	  </table>
    </div>
  </div>
<!--聯絡資訊end-->
<!--更多資訊-->
<div class="card">
  <div class="card-header">
    更多資訊
  </div>
    <div class="card-block">
    <table class="table" style="word-break: break-all;">
			    <tr>
			      <th scope="row" style="width:30%;">出租要求性別</th>
			      <td>{{ $requestgender[$user->rent()->first()->requestgender] }}</td>
			    </tr>
			    <tr>
			      <th scope="row">收費</th>
			      <td>{{ $user->rent()->first()->fee }} 每小時</td>
			    </tr>
			      <tr>
			      <th scope="row">服務地址</th>
			      <td>{{ $user->rent()->first()->serviceaddress }}</td>
			    </tr>
			    <tr>
			      <th scope="row">服務時間</th>
			      <td>{{ $user->rent()->first()->servicetime }}</td>
			    </tr>
			    <tr>
			      <th scope="row">使用語言</th>
			      <td>{{ $user->rent()->first()->language }}</td>
			    </tr>
			    <tr>
			      <th scope="row">胸圍</th>
			      <td>{{ $user->rent()->first()->bust }} 英吋</td>
			    </tr>
			    <tr>
			      <th scope="row">腰圍</th>
			      <td>{{ $user->rent()->first()->waistline }} 英吋</td>
			    </tr>
			    <tr>
			      <th scope="row">臀圍</th>
			      <td>{{ $user->rent()->first()->hips }} 英吋</td>
			    </tr>
			    <tr>
			      <th scope="row">有無小孩</th>
			      <td>{{ $haschild[$user->rent()->first()->haschild] }}</td>
			    </tr>
	  </table>
    </div>
  </div>
<!--更多資訊end-->
@endif

@endsection


<!--model-->
<div class="modal fade" id="ImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">更新頭像</h4>
        </div>
        <div class="modal-body">
        	@if($errors->has())
                <div class="alert alert-danger">
                   @foreach ($errors->all() as $error)
                      {{ $error }} <br />
                  @endforeach
                </div>
                @endif
        {!! Form::model($user,['route' => ['user.updateprofile', $user->id], 'method' => 'PATCH', 'role' => 'form','files'=>true]) !!}
        {!! Form::hidden('img', 'true') !!}
        <div class="form-group">
              {!! Form::label('image', '選取圖片',array('class' => 'col-sm-2 form-control-label')) !!}
              <label class="file">
              	<div class="col-sm-10">
              {!! Form::file('image', array('class'=> 'form-control', 'id' => 'file','onchange'=>'readURL(this);')) !!}
              <span class="file-custom"></span>
          		</div>
              </label>
              <!-- <input type="text" class="form-control" id="recipient-name"> -->
            </div>
            <!--預覽-->

       	<div>  
		<div id="image_preview" ><center><img class="img-rounded" height="auto" width="30%" id="previewing" src="{{ $user->image }}" /></center></div>
			
		</div>

       <!--預覽end-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
          <button type="submit" class="btn btn-primary" data-dismiss="modal" onClick="$('form').submit();">確定更新</button>
        </div>
       {!! Form::close() !!}
       


      </div>
    </div>
  </div>

@if($errors->has())
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script>
$(function() {
    $('#ImgModal').modal('show');
});
</script>
@endif

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
