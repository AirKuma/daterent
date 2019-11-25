@extends('layouts.master')

@section('content')

<div class="container">
        <div class="row">
          <div class="card">
  <div class="card-header">
    出租主頁
    <div class="pull-xs-right" style="color:grey;font-size:13px;">
    @if($user->rent()->first()!=null)
    @if($user->rent()->first()->motto!=null)
    {{ $user->rent()->first()->motto }}
    @endif
    @endif
    <a href="{{ route('report.create', $user->id )}}" class="btn pull-xs-right">舉報</a>
    </div>
  </div>
  <div class="row">
   <div class="col-sm-3">
    <div class="card-block">  
        <img class="img-rounded card-img-top img-responsive" style="width: 100%;" src="{{ $user->image }}" data-src="holder.js/100%x180/?text=Image cap" alt="Card image cap">
    </div>
     <div class="card-block">  
        <h4 class="card-text"><center>{{ $user->name }}</center></h4><br>
      <h6>追蹤人數:{{ $user->follows()->where('follow_id',$user->id)->count() }}人</h6>
    </div>  
  </div>  
  <div class="col-sm-8">
        <div class="table-responsive">
        <table class="table" style="word-break: break-all;">
        <tr>
            <th scope="row" style="width:17%;">性別</th>
            <td style="width:33%;">{{ $gender[$user->gender] }}</td>
            <th scope="row" style="width:17%;">年齡</th>
            <td>{{ $age }}</td>
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
          @if($user->rent()->first()!=null)
         @if($user->comments()->first()!=null)
          <tr>
            <th scope="row">圖片真實性</th>
            <td style="width:70%;"><progress class="progress progress-striped progress-danger" value="{{ number_format($user->comments()->avg('comments.picture'), 0) }}" max="100">{{ number_format($user->comments()->avg('comments.picture'), 0) }}%</progress></td>
            <td>{{ number_format($user->comments()->avg('comments.picture'), 0) }}分</td>
          </tr>
          <tr>
            <th scope="row">身材評分</th>
            <td style="width:70%;"><progress class="progress progress-striped progress-danger" value="{{ number_format($user->comments()->avg('comments.figure'), 0) }}" max="100">{{ number_format($user->comments()->avg('comments.figure'), 0) }}%</progress></td>
            <td>{{ number_format($user->comments()->avg('comments.figure'), 0) }}分</td>
          </tr>
          <tr>
            <th scope="row">工作態度</th>
            <td style="width:70%;"><progress class="progress progress-striped progress-danger" value="{{ number_format($user->comments()->avg('comments.attitude'), 0) }}" max="100">{{ number_format($user->comments()->avg('comments.attitude'), 0) }}%</progress></td>
            <td>{{ number_format($user->comments()->avg('comments.attitude'), 0) }}分</td>
          </tr>
          <tr>
            <th scope="row">合理收費</th>
            <td style="width:70%;"><progress class="progress progress-striped progress-danger" value="{{ number_format($user->comments()->avg('comments.fee'), 0) }}" max="100">{{ number_format($user->comments()->avg('comments.fee'), 0) }}%</progress></td>
            <td>{{ number_format($user->comments()->avg('comments.fee'), 0) }}分</td>
          </tr>
          @endif
          @endif
          </table>
          <table class="table" style="word-break: break-all;">
            <td style="width:25%;">@if(!Auth::check())<button disabled="disabled" title="請先登入" type="button" class="btn btn-danger btn-block">我要租</button>@elseif($user->id==$myprofiledata->id || $user->rent()->first()==null || $user->rent()->first()->ifrent!=1)<button disabled="disabled" title="@if($user->id==$myprofiledata->id)無法租自己@else不開放出租@endif" type="button" class="btn btn-danger btn-block">我要租</button>@else<a href="{{ route('rentuser.store', $user->rent()->first()->id )}}" class="btn btn-danger btn-block">我要租</a>@endif</td>
            <td style="width:25%;"><a href="{{ route('create.message', $user->id )}}" class="btn btn-primary btn-block">傳送訊息</a></td>
            <td style="width:25%;">@if(!Auth::check())<button disabled="disabled" title="請先登入" type="button" class="btn btn-primary btn-block">我要評論</button>@elseif($user->id==$myprofiledata->id || $user->rent()->first()==null || Auth::user()->rentusers()->where('rent_id',$user->rent()->first()->id)->count()==0 || Auth::user()->comment()->where('rent_id',$user->rent()->first()->id)->count()!=0)<button disabled="disabled" title="無法評論" type="button" class="btn btn-primary btn-block">我要評論</button>@else<a href="{{ route('comment.create', $user->rent()->first()->id )}}" class="btn btn-primary btn-block">我要評論</a>@endif</td>
            <td style="width:25%;">@if(!Auth::check())<button disabled="disabled" title="請先登入" type="button" class="btn btn-primary btn-block">我要追蹤</button>@elseif($user->id==$myprofiledata->id)<button disabled="disabled" title="無法追蹤自己" type="button" class="btn btn-primary btn-block">我要追蹤</button>@else<a href="@if(Auth::user()->follow()->where('follow_id',$user->id)->first()==null){{ route('follow.store',$user->id) }}@else{{ route('follow.destroy',Auth::user()->follow()->where('follow_id',$user->id)->first()->id) }}@endif" class="btn btn-primary btn-block">@if(Auth::user()->follow()->where('follow_id',$user->id)->first()==null)我要追蹤@else取消追蹤@endif</a>@endif</td>
          </table>

      </div>
  </div>  
  </div>
</div>

 @if($user->rent()->first()!=null)
  @if($user->rent()->first()->ifrent==1)
  <!--有出租才顯示e-->  
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
            <th scope="row" style="width:30%;">收費</th>
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
    </table>
    </div>
  </div>
<!--更多資訊end-->

<!--有出租才顯示end-->  
  @endif
@endif 

@if($user->pictures()->first()!=null)
<!--照片-->
<div class="card">
  <div class="card-header">
    {{ $user->name }}的照片
    <a href="{{ route('all.picture', $user->id )}}" class="btn pull-xs-right">更多</a>
  </div>
    <div class="card-block">
    <table style="width:{{ 25*$pictures->count() }}%;">
       <tr>
      @foreach($pictures as $picture)
          <td style="padding:2px;">
            <a href="{{ $picture->picture }}"><img class="img-rounded img-rounded img-responsive" style="width: 100%;" src="{{ $picture->picture }}" title="{{ $picture->describe }}"></a>
          </td>  
      @endforeach
      </tr>
      </table>
    </div>
  </div>
<!--照片end-->
@endif

@if($user->videos()->first()!=null)
<!--影片-->
<div class="card">
  <div class="card-header">
    {{ $user->name }}的影片
    <a href="{{ route('all.video', $user->id )}}" class="btn pull-xs-right">更多</a>
  </div>
    <div class="card-block">
      <table style="width:{{ 100/3*$videos->count() }}%;">
       <tr>
      @foreach($videos as $video)
        <td style="padding:2px;">
          <div class="embed-responsive embed-responsive-16by9">
                <iframe src="{{ $video->video }}" frameborder="0" allowfullscreen></iframe>
          </div>
        </td> 
      @endforeach
      </tr>
      </table>
    </div>
  </div>
<!--影片end-->
@endif

</div>
</div> 

@endsection