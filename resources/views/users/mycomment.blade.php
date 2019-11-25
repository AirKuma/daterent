@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    我的評價
  </div>
<div class="card-block">  
<div class="card-deck-wrapper">
  <div class="card-deck">
  	<ul class="nav nav-tabs">
   <li class="nav-item">
    <a @if($step == 1){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="{{ route('user.comment', ['id' =>  Request::segment(3), 'step' => 1]) }}">我收到的評價</a>
  </li>
  <li class="nav-item">
    <a @if($step == 2){!! "class='nav-link active'" !!}@else {!! "class='nav-link'" !!}@endif href="{{ route('user.comment', ['id' =>  Request::segment(3), 'step' => 2]) }}">我發出的評價</a>
  </li>
</ul>
<div class="card-block">
	@if($step == 1)
  @if($mycomments->count()==0)
      <h4>暫無訊息</h4>
    @else
      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:13%;">日期</th>
            <th style="width:19%;">評價人</th>
            <th style="width:15%;">項目</th>
            <th style="width:45%;">分數</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($mycomments as $comment)
          <tr>
            <td rowspan="4">{{ $comment->created_at }}</td>
            <td rowspan="4"><a href="{{ route('rent.show',$comment->user()->first()->id) }}">{{ $comment->user()->first()->name }}</a></td>
            <td>圖片真實性</td>
            <td><progress class="progress progress-striped progress-danger" value="{{ $comment->picture  }}" max="100">{{ $comment->picture  }}%</progress></td>
            <td>{{ $comment->picture }}分</td>
            <tr>
              <td>身材評分</td>
              <td><progress class="progress progress-striped progress-danger" value="{{ $comment->figure  }}" max="100">{{ $comment->figure  }}%</progress></td>
              <td>{{ $comment->figure }}分</td>
            </tr>
            <tr>
              <td>工作態度</td>
              <td><progress class="progress progress-striped progress-danger" value="{{ $comment->attitude  }}" max="100">{{ $comment->attitude  }}%</progress></td>
              <td>{{ $comment->attitude }}分</td>
            </tr>
            <tr>
              <td>合理收費</td>
              <td><progress class="progress progress-striped progress-danger" value="{{ $comment->fee  }}" max="100">{{ $comment->fee  }}%</progress></td>
              <td>{{ $comment->fee }}分</td>
            </tr>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
    @endif

    @if($step == 2)
    @if($comments->count()==0)
      <h4>暫無訊息</h4>
    @else
      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:13%;">日期</th>
            <th style="width:19%;">被評人</th>
            <th style="width:15%;">項目</th>
            <th style="width:45%;">分數</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($comments as $comment)
          <tr>
            <td rowspan="4">{{ $comment->created_at }}</td>
            <td rowspan="4"><a href="{{ route('rent.show',$comment->comments()->first()->id) }}">{{ $comment->comments()->first()->name }}</a></td>
            <td>圖片真實性</td>
            <td><progress class="progress progress-striped progress-danger" value="{{ $comment->picture  }}" max="100">{{ $comment->picture  }}%</progress></td>
            <td>{{ $comment->picture }}分</td>
            <tr>
              <td>身材評分</td>
              <td><progress class="progress progress-striped progress-danger" value="{{ $comment->figure  }}" max="100">{{ $comment->figure  }}%</progress></td>
              <td>{{ $comment->figure }}分</td>
            </tr>
            <tr>
              <td>工作態度</td>
              <td><progress class="progress progress-striped progress-danger" value="{{ $comment->attitude  }}" max="100">{{ $comment->attitude  }}%</progress></td>
              <td>{{ $comment->attitude }}分</td>
            </tr>
            <tr>
              <td>合理收費</td>
              <td><progress class="progress progress-striped progress-danger" value="{{ $comment->fee  }}" max="100">{{ $comment->fee  }}%</progress></td>
              <td>{{ $comment->fee }}分</td>
            </tr>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div> 
    @endif
    @endif
     </div>

  </div>
  </div>
</div>
@if($step == 1)
<center>{!! $mycomments->render() !!}</center>
@else
<center>{!! $comments->render() !!}</center>
@endif

</div>
@endsection


@if(Session::has('message'))
<script language="javascript">
<!--
var alarm=alert("此帳號已遭封鎖!!");
-->
</script>

 @endif