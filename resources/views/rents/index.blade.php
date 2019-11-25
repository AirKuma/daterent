@extends('layouts.master')

@section('content')

<script type="text/javascript">
department= new Array('不限','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45');
  function age(index){
    document.getElementById('agee').options[0]=new Option(department[0], department[0]); 
  for(var i=index;i<29;i++)
    document.getElementById('agee').options[i-index+1]=new Option(department[i+1], department[i+1]); 
  document.getElementById('agee').length=29-index; 
}
</script>

<script type="text/javascript">
function nat(index) {
    if(index == "1"){
        $("#a1").show();
    } else {
        $("#a1").hide();
    }
    if(index == "2"){
        $("#a2").show();
    } else {
        $("#a2").hide();
    }
   if(index == "3"){
        $("#a3").show();
    } else {
        $("#a3").hide();
    }
    if(index == "4"){
        $("#a4").show();
    } else {
        $("#a4").hide();
    }
    if(index == "5"){
        $("#a5").show();
    } else {
        $("#a5").hide();
    }
    if(index == "6"){
        $("#a6").show();
    } else {
        $("#a6").hide();
    }
    if(index == "7"){
        $("#a7").show();
    } else {
        $("#a7").hide();
    }
    if(index == "8"){
        $("#u1").show();
    } else {
        $("#u1").hide();
    }
    if(index == "9"){
        $("#u2").show();
    } else {
        $("#u2").hide();
    }
    if(index == "10"){
        $("#e1").show();
    } else {
        $("#e1").hide();
    }
    if(index == "11"){
        $("#e2").show();
    } else {
        $("#e2").hide();
    }
    if(index == "12"){
        $("#e3").show();
    } else {
        $("#e3").hide();
    }
    if(index == "13"){
        $("#e4").show();
    } else {
        $("#e4").hide();
    }
    if(index == "14"){
        $("#e5").show();
    } else {
        $("#e5").hide();
    }
    if(index == "15"){
        $("#oceania").show();
    } else {
        $("#oceania").hide();
    }
    if(index == "16"){
        $("#antarctica").show();
    } else {
        $("#antarctica").hide();
    }
    if(index == "17"){
        $("#africa").show();
    } else {
        $("#africa").hide();
    }
}
</script>

<script type="text/javascript">
    function check_all(source) {
        var aInputs = document.getElementsByTagName('input');
        for (var i=0;i<aInputs.length;i++) {
            if (aInputs[i] != source && aInputs[i].className == source.className) {
                aInputs[i].checked = source.checked;
            }
        }
    }
 </script> 

<div class="container">
   <div class="row">
    <div class="card">
  <div class="card-header">
    出租列表
  </div>

    <div class="card-block">
  {!! Form::open(['route' => ['rent.index', Request::segment(3)], 'method' => 'get','class' => 'form-inline']) !!}
                <fieldset class="card-block">
                    <div class="form-group">
                    <label for="gender">性別：</label>
                        {!! Form::select('gender', ['男生','女生'], $sergen, ['class' => 'form-control','id'=>'gender']) !!}
                    </div>
                    <div class="form-group">
                    <label for="region">地區：</label>
                         {!! Form::select('region', ['不限','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他'], null, ['class' => 'form-control','id' =>'region']) !!}
                    </div>
                    <div class="form-group">
                    <label for="country">國籍：</label>
                         {!! Form::select('country', ['不限','東亞','東北亞','東南亞','南亞','西亞','中亞','北亞','北美洲','南美洲','西歐','中歐','南歐','北歐','東歐','大洋洲','南極洲','非洲'], null, ['class' => 'form-control','id' =>'country','onchange'=>'nat(this.selectedIndex)']) !!}
                    </div>
                    <div class="form-group">
                    <label for="age">年齡範圍：</label>
                        {!! Form::select('ages', ['不限','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45'], null, ['class' => 'form-control','id'=>'ages','onchange'=>'age(this.selectedIndex)']) !!}~
                        {!! Form::select('agee', ['不限','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45'] , null, ['class' => 'form-control','id'=>'agee']) !!}
                    </div>
                    <div class="form-group">
                    <label for="name">姓名：</label>
                        {!! Form::text('name', null, ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                         {!! Form::submit('搜尋', ['class' => 'btn btn-primary']) !!}                                                              
                   </div>  
                   <!--國籍checkbox--> 
                   <div style="padding:10px 0px 10px 0px;">
                     <div id="a1" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='a1' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=0;$i<=3;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'a1']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="a2" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='a2' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=4;$i<=7;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'a2']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="a3" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='a3' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=8;$i<=18;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'a3']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="a4" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='a4' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=19;$i<=25;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'a4']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="a5" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='a5' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=26;$i<=44;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'a5']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="a6" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='a6' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=45;$i<=50;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'a6']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="a7" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='a7' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=51;$i<=51;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'a7']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="u1" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='u1' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=52;$i<=62;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'u1']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="u2" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='u2' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=63;$i<=76;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'u2']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="e1" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='e1' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=77;$i<=86;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'e1']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="e2" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='e2' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=87;$i<=95;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'e2']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="e3" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='e3' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=96;$i<=112;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'e3']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="e4" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='e4' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=113;$i<=119;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'e4']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="e5" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='e5' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=120;$i<=125;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'e5']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="oceania" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='oceania' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=126;$i<=128;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'oceania']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="antarctica" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='antarctica' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=129;$i<=129;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'antarctica']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                     <div id="africa" style="display:none;">
                      請選擇國家：
                          <label class="c-input c-checkbox">
                              <input type="checkbox" class='africa' onclick="check_all(this)"/>  
                              <span class="c-indicator"></span>
                              全選
                          </label>
                          @for($i=130;$i<=147;$i++)
                          <label class="c-input c-checkbox">
                              {!! Form::checkbox('nationality[]', $i,null,['class' =>'africa']) !!}  
                              <span class="c-indicator"></span>
                              {{ $nationality[$i] }}
                          </label>
                          @endfor   
                     </div>
                   </div>
                   <!--國籍checkbox end-->
                  <div class="form-group pull-xs-right"> 
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a @if($sort=='new'){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="/rent/index/new?gender={{$gen}}&region={{$reg}}&country={{$cou}}&ages={{$ages}}&agee={{$agee}}@for($i=0;$i<count($countrys);$i++)&nationality[]={{ $countrys[$i] }}@endfor&name={{$name}}">時間排序</a>
                    </li>
                    <li class="nav-item">
                      <a @if($sort=='feer'){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="/rent/index/favorites?gender={{$gen}}&region={{$reg}}&country={{$cou}}&ages={{$ages}}&agee={{$agee}}@for($i=0;$i<count($countrys);$i++)&nationality[]={{ $countrys[$i] }}@endfor&name={{$name}}">價錢排序(由高至低)</a>
                    </li>
                    <li class="nav-item">
                      <a @if($sort=='fee'){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="/rent/index/fee?gender={{$gen}}&region={{$reg}}&ages={{$ages}}&country={{$cou}}&agee={{$agee}}@for($i=0;$i<count($countrys);$i++)&nationality[]={{ $countrys[$i] }}@endfor&name={{$name}}">價錢排序(由低至高)</a>
                    </li>
                  </ul>
                </div>
                </fieldset>   
                {!! Form::close() !!}  

    
<div class="card-block row">
@foreach($rents as $rent)
  <div class="col-sm-4">
      <img data-toggle="modal" data-target="#RentModal-{{ $rent->id }}" data-whatever="@mdo" class="img-rounded card-img-top img-responsive" style="width: 100%;height:300px;" src="{{ $rent->user()->first()->image }}" data-src="holder.js/100%x80/?text=Image cap" alt="Card image cap">
        <p class="card-text">
          <table class="table" style="word-break: break-all;">
          <tr>
        <tr>
            <th scope="row" style="width:20%;">價錢</th>
            <td style="width:33%;">TWD ${{ $rent->fee }} 每小時</td>
          </tr>
        </table> 
        </p>
      </div>

      <!--出租modal-->
          <div class="modal fade" id="RentModal-{{ $rent->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">{{ $rent->user()->first()->name }}</h4>
                    @if($rent->motto!=null)
                      <div class="pull-xs-right" style="color:grey;font-size:13px;">{{ $rent->motto }}</div>
                    @endif
                  </div>
                  <div class="modal-body">
                      <!--出租主頁--> 
    <div class="card-block">
    <div class="col-sm-4">  
        <img class="img-rounded img-responsive" style="width: 100%;" src="{{ $rent->user()->first()->image }}" data-src="holder.js/100%x180/?text=Image cap" alt="Card image cap">
    </div>
    <div class="col-sm-8">
      <h6>追蹤人數:{{ $rent->follows()->where('follow_id',$rent->user()->first()->id)->count() }}人</h6>
    </div>
    </div>
        <div class="table-responsive">
        <table class="table" style="word-break: break-all;">
        <tr>
            <th scope="row" style="width:17%;">性別</th>
            <td style="width:33%;">{{ $gender[$rent->user()->first()->gender] }}</td>
            <th scope="row" style="width:17%;">年齡</th>
            <td>{{ $rent->age($rent->user()->first()->id) }}</td>
          </tr>
          <tr>
            <th scope="row">身高</th>
            <td>{{ $rent->user()->first()->height }}</td>
           <th scope="row">體重</th>
            <td>{{ $rent->user()->first()->weight }}</td>
          </tr>
          <tr>
            <th scope="row">國籍</th>
            <td>{{ $nationality[$rent->user()->first()->nationality] }}</td>
            <th scope="row">所在城市</th>
            <td>{{ $region[$rent->user()->first()->city] }}</td>
          </tr>
        </table>  
        <table class="table" style="word-break: break-all;">
          <tr>
            <th scope="row" style="width:20%;">職業</th>
            <td>{{ $rent->user()->first()->career }}</td>
          </tr>
          <tr>
            <th scope="row">自我介紹</th>
            <td>{!! nl2br(e($rent->user()->first()->introduction )) !!}</td>
          </tr>
          <tr>
            <th scope="row">理想對象</th>
            <td>{{ $rent->user()->first()->ideal }}</td>
          </tr>
          @if($rent->comment()->first()!=null)
          <tr>
            <th scope="row">圖片真實性</th>
            <td style="width:65%;"><progress class="progress progress-striped progress-danger" value="{{ number_format($rent->comment()->avg('comments.picture'), 0) }}" max="100">{{ number_format($rent->comment()->avg('comments.picture'), 0) }}%</progress></td>
            <td>{{ number_format($rent->comment()->avg('comments.picture'), 0) }}分</td>
          </tr>
          <tr>
            <th scope="row">身材評分</th>
            <td style="width:65%;"><progress class="progress progress-striped progress-danger" value="{{ number_format($rent->comment()->avg('comments.figure'), 0) }}" max="100">{{ number_format($rent->comment()->avg('comments.figure'), 0) }}%</progress></td>
            <td>{{ number_format($rent->comment()->avg('comments.figure'), 0) }}分</td>
          </tr>
          <tr>
            <th scope="row">工作態度</th>
            <td style="width:65%;"><progress class="progress progress-striped progress-danger" value="{{ number_format($rent->comment()->avg('comments.attitude'), 0) }}" max="100">{{ number_format($rent->comment()->avg('comments.attitude'), 0) }}%</progress></td>
            <td>{{ number_format($rent->comment()->avg('comments.attitude'), 0) }}分</td>
          </tr>
          <tr>
            <th scope="row">合理收費</th>
            <td style="width:65%;"><progress class="progress progress-striped progress-danger" value="{{ number_format($rent->comment()->avg('comments.fee'), 0) }}" max="100">{{ number_format($rent->comment()->avg('comments.fee'), 0) }}%</progress></td>
            <td>{{ number_format($rent->comment()->avg('comments.fee'), 0) }}分</td>
          </tr>
          @endif
          </table>
          <table class="table" style="word-break: break-all;">
            <td style="width:25%;">@if(!Auth::check())<button disabled="disabled" title="請先登入" type="button" class="btn btn-danger btn-block">我要租</button>@elseif($rent->user()->first()->id==$myprofiledata->id)<button disabled="disabled" title="無法租自己" type="button" class="btn btn-danger btn-block">我要租</button>@else<a href="{{ route('rentuser.store', $rent->id )}}" class="btn btn-danger btn-block">我要租</a>@endif</td>
            <td style="width:25%;"><a href="{{ route('create.message', $rent->user()->first()->id )}}" class="btn btn-primary btn-block">傳送訊息</a></td>
            <td style="width:25%;">@if(!Auth::check())<button disabled="disabled" title="請先登入" type="button" class="btn btn-primary btn-block">我要評論</button>@elseif($rent->user()->first()->id==$myprofiledata->id || Auth::user()->rentusers()->where('rent_id',$rent->id)->count()==0 || Auth::user()->comment()->where('rent_id',$rent->id)->count()!=0)<button disabled="disabled" title="無法評論" type="button" class="btn btn-primary btn-block">我要評論</button>@else<a href="{{ route('comment.create', $rent->id )}}" class="btn btn-primary btn-block">我要評論</a>@endif</td>
            <td style="width:25%;">@if(!Auth::check())<button disabled="disabled" title="請先登入" type="button" class="btn btn-primary btn-block">我要追蹤</button>@elseif($rent->user()->first()->id==$myprofiledata->id)<button disabled="disabled" title="無法追蹤自己" type="button" class="btn btn-primary btn-block">我要追蹤</button>@else<a href="@if(Auth::user()->follow()->where('follow_id',$rent->user()->first()->id)->first()==null){{ route('follow.store',$rent->user()->first()->id) }}@else{{ route('follow.destroy',Auth::user()->follow()->where('follow_id',$rent->user()->first()->id)->first()->id) }}@endif" class="btn btn-primary btn-block">@if(Auth::user()->follow()->where('follow_id',$rent->user()->first()->id)->first()==null)我要追蹤@else取消追蹤@endif</a>@endif</td>
          </table>

<!--聯絡資訊-->
<div class="card">
  <div class="card-header">
    聯絡資訊
  </div>
    <div class="card-block">
    <table class="table" style="word-break: break-all;">
          <tr>
            <th scope="row" style="width:30%;">手機</th>
            <td>{{ $rent->phone }}</td>
          </tr>
          <tr>
            <th scope="row">E-mail</th>
            <td>{{ $rent->user()->first()->email }}</td>
          </tr>
            <tr>
            <th scope="row">Facebook連結</th>
            <td><a href="{{ $rent->facebook }}">{{ $rent->facebook }}</a></td>
          </tr>
          <tr>
            <th scope="row">Youtube連結</th>
            <td><a href="{{ $rent->youtube }}">{{ $rent->youtube }}</a></td>
          </tr>
          @if($rent->web!=null)
          <tr>
            <th scope="row">個人網站連結</th>
            <td><a href="{{ $rent->web }}">{{ $rent->web }}</a></td>
          </tr>
          @endif
          @if($rent->line!=null)
          <tr>
            <th scope="row">line</th>
            <td>{{ $rent->line }}</td>
          </tr>
          @endif
          @if($rent->telegram!=null)
          <tr>
            <th scope="row">telegram</th>
            <td>{{ $rent->telegram }}</td>
          </tr>
          @endif
          @if($rent->wechat!=null)
          <tr>
            <th scope="row">wechat</th>
            <td>{{ $rent->wechat }}</td>
          </tr>
          @endif
          @if($rent->Whatsapp!=null)
          <tr>
            <th scope="row">Whatsapp</th>
            <td>{{ $rent->Whatsapp }}</td>
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
            <td>TWD ${{ $rent->fee }} 每小時</td>
          </tr>
            <tr>
            <th scope="row">服務地址</th>
            <td>{{ $rent->serviceaddress }}</td>
          </tr>
          <tr>
            <th scope="row">服務時間</th>
            <td>{{ $rent->servicetime }}</td>
          </tr>
          <tr>
            <th scope="row">使用語言</th>
            <td>{{ $rent->language }}</td>
          </tr>
          <tr>
            <th scope="row">胸圍</th>
            <td>{{ $rent->bust }} 英吋</td>
          </tr>
          <tr>
            <th scope="row">腰圍</th>
            <td>{{ $rent->waistline }} 英吋</td>
          </tr>
          <tr>
            <th scope="row">臀圍</th>
            <td>{{ $rent->hips }} 英吋</td>
          </tr>
    </table>
    </div>
  </div>
<!--更多資訊end--> 

      </div>
 
                      <!--endof出租主頁-->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                    <a class="btn btn-secondary" href="{{ route('rent.show',$rent->user()->first()->id) }}">進入主頁</a>
                  </div>
                 
              </div>
            </div>
        </div>    
   <!--endof出租modal-->   
 @endforeach
 </div> 


    </div>
  </div>
   </div>
</div>
@endsection

