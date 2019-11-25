@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    出租要求
  </div>

		<div class="card-block">
      @if($user->requests()->first()==null)
      <h3>暫無出租要求</h3>
      @else
      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:20%;">日期</th>
            <th style="width:42%;">主旨</th>
            <th style="width:12%;">招聘城市</th>
            <th style="width:10;">招聘性別</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($requests as $request)
          <tr>
            <td>{{ $request->created_at }}</td>
            <td>{{ str_limit($request->title, $limit = 40, $end = '...') }}</td>
            <td>{{ $region[$request->region] }}</td>
            <td>{{ $gender[$request->gender] }}</td>
            <td><a href="{{ route('request.destroy', ['uid' =>  Request::segment(3), 'id' => $request->id] )}}">刪除</a></td>
            <td><a href="{{ route('request.edit', ['id' =>  Request::segment(3), 'rid' => $request->id]) }}">修改</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <center>{!! $requests->render() !!}</center>
    @endif
    </div>

  </div>
@endsection