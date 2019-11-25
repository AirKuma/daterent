@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    相片中心
    <a href="{{ route('picture.create', $user->id )}}" class="btn pull-xs-right">新增相片</a>
  </div>

		<div class="card-block">
      @if($user->pictures()->first()==null)
      <h3>暫無相片</h3>
      @else
      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:20%;">新增日期</th>
            <th style="width:20%;">相片</th>
            <th style="width:40%;">相片描述</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($pictures as $picture)
          <tr>
            <td>{{ $picture->created_at }}</td>
            <td><img style="height:150px;width:100%;" src="{{ $picture->picture }}"></td>
            <td>@if($picture->describe==null)無@else{!! nl2br(e($picture->describe)) !!}@endif</td>
            <td><a href="{{ route('picture.destroy',$picture->id )}}">刪除</a></td>
            <td><a href="{{ route('picture.edit', ['id' =>  Request::segment(3), 'rid' => $picture->id]) }}">修改</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <center>{!! $pictures->render() !!}</center>
    @endif
    </div>

  </div>
@endsection