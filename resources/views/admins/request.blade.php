@extends('layouts.admin')
@section('admin_content')
<div class="card">
  <div class="card-header">
    出租要求管理
  </div>
	<div class="card-block">
		
<div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr> 
            <th style="width:5%;">ID</th>
            <th style="width:20%;">發布人</th>
            <th style="width:30%;">主旨</th>
            <th style="width:20%;">發布日期</th>
            <th style="width:15%;">出租要求主頁</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          @foreach($requests as $request)
          <tr>
            <td>{{ $request->id }}</td>
            <td>{{ $request->user()->first()->name }}</td>
            <td>{{ str_limit($request->title, $limit = 28, $end = '...') }}</td>
            <td>{{ $request->created_at}}</td>
            <td><a href="{{ route('request.show', $request->id)}}">主頁連結</a></td>
            <td><a href="{{ route('admin.request.destroy', $request->id)}}" class="btn btn-primary">刪除</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
  	<center>{!! $requests->render() !!}</center>
</div>
@endsection