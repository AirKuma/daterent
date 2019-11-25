@extends('layouts.user')
@section('user_content')
<div class="card">
  <div class="card-header">
    影片中心
    <a href="{{ route('video.create', $user->id )}}" class="btn pull-xs-right">新增影片</a>
  </div>

		<div class="card-block">
      @if($user->videos()->first()==null)
      <h3>暫無影片</h3>
      @else
      <div class="table-responsive">
      <table class="table" style="word-break: break-all;">
        <thead class="thead-inverse">
          <tr>
            <th style="width:20%;">新增日期</th>
            <th style="width:25%;">影片</th>
            <th style="width:40%;">影片描述</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($videos as $video)
          <tr>
            <td>{{ $video->created_at }}</td>
            <td>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe  src="{{ $video->video }}" frameborder="0" allowfullscreen></iframe>
              </div>
            </td>
            <td>@if($video->describe==null)無@else{!! nl2br(e($video->describe)) !!}@endif</td>
            <td><a href="{{ route('video.destroy',$video->id )}}">刪除</a></td>
            <td><a href="{{ route('video.edit', ['id' =>  Request::segment(3), 'vid' => $video->id]) }}">修改</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <center>{!! $videos->render() !!}</center>
    @endif
    </div>

  </div>
@endsection