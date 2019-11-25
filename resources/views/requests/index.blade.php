@extends('layouts.master')

@section('content')

<div class="container">

      <!-- Example row of columns -->
        <div class="row">
  		<div class="card">
  <div class="card-header">
    出租要求
  </div>

		<div class="card-block">
	{!! Form::open(['route' => 'request.search', 'method' => 'get','class' => 'form-inline']) !!}
                <fieldset class="card-block">
                    <div class="form-group">
                    <label for="gender">性別：</label>
                        {!! Form::select('gender', ['男生','女生'], null, ['class' => 'form-control','id'=>'gender']) !!}
                    </div>
                    <div class="form-group">
                    <label for="region">地區：</label>
                         {!! Form::select('region', ['不限','臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','新竹市','新竹縣','苗栗縣','彰化縣','南投縣','雲林縣','嘉義縣','屏東縣','宜蘭縣','花蓮縣','臺東縣','澎湖縣','金門縣','連江縣','其他'], null, ['class' => 'form-control','id' =>'region']) !!}
                    </div>
                    <div class="form-group">
                         {!! Form::submit('搜尋', ['name' => 'search','class' => 'btn btn-primary']) !!}  
                         	                                     
                   </div>   
                   <a href="{{ route('request.create') }}" class="btn btn-primary pull-xs-right">發布出租要求</a>
                </fieldset>   
                {!! Form::close() !!}  

      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:20%;">發布人</th>
            <th style="width:40%;">主旨</th>
            <th style="width:15%;">招聘城市</th>
            <th style="width:10;">招聘性別</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($requests as $request)
          <tr>
            <td><a href="{{ route('rent.show',$request->user()->first()->id) }}">{{ $request->user()->first()->name }}</a></td>
            <td>{{ str_limit($request->title, $limit = 45, $end = '...') }}</td>
            <td>{{ $region[$request->region] }}</td>
            <td>{{ $gender[$request->gender] }}</td>
            <td><a href="{{ route('request.show',$request->id) }}">詳細資訊</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
    <center>{!! $requests->render() !!}</center>
  </div>

      </div>
      
    </div> <!-- /container -->

@endsection