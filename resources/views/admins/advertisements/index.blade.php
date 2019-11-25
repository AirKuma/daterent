@extends('layouts.admin')
@section('admin_content')
<div class="card">
  <div class="card-header">
    廣告管理
    <a href="{{ route('admin.advertisement.create')}}" class="btn pull-xs-right">新增廣告</a>
  </div>
	<div class="card-block">
	  @if($advertisements==null)
      <h3>暫無廣告</h3>
      @else
      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:12%;">新增日期</th>
            <th style="width:15%;">廣告商</th>
            <th style="width:20%;">廣告圖片</th>
            <th style="width:35%;">廣告描述</th>
            <th style="width:9%;">操作</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($advertisements as $advertisement)
          <tr>
            <td>{{ $advertisement->created_at }}</td>
            <td>{{ str_limit($advertisement->advertiser, $limit = 60, $end = '...') }}</td>
            <td><a href="{{ $advertisement->navigateurl }}"><img style="height:150px;width:100%;" src="{{ $advertisement->imageurl }}"></a></td>
            <td>@if($advertisement->describe==null)無@else{!! str_limit(nl2br(e($advertisement->describe)), $limit = 100, $end = '...') !!}@endif</td>
            <td><a href="{{ route('admin.advertisement.edit', $advertisement->id) }}" class="btn btn-primary">修改</a></td>
            <td><a href="{{ route('admin.advertisement.destroy',$advertisement->id )}}" class="btn btn-primary">刪除</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <center>{!! $advertisements->render() !!}</center>
    @endif
  </div>

</div>
@endsection