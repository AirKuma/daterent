@extends('layouts.admin')
@section('admin_content')
<div class="card">
  <div class="card-header">
    舉報管理
  </div>
	<div class="card-block">
		
<div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr> 
            <th style="width:5%;">ID</th>
             <th style="width:15%;">舉報時間</th>
            <th style="width:13%;">舉報者</th>
            <th style="width:13%;">被舉報者</th>
            <th style="width:15%;">舉報類別</th>
            <th style="width:45%;">舉報內容</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reports as $report)
          <tr>
            <td>{{ $report->id }}</td>
            <td>{{ $report->created_at}}</td>
            <td>{{ $report->user()->first()->name }}</td>
            <td>{{ $report->rent()->first()->user()->first()->name }}</td>
            <td>{{ $reportclass[$report->class] }}</td>
            <td>{!! nl2br(e($report->content )) !!}</td>
            <td><a href="{{ route('admin.report.destroy', $report->id)}}" class="btn btn-primary">刪除</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
  	<center>{!! $reports->render() !!}</center>
</div>
@endsection