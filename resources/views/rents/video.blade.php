@extends('layouts.master')

@section('content')

<div class="container">
     <div class="row">

     	<div class="card">
  <div class="card-header">
    {{ $user->name }}的影片
  </div>
    <div class="card-block row">
      @foreach($videos as $video)
        <div class="col-sm-4" style="padding:2px;">
          <div class="embed-responsive embed-responsive-16by9">
                <iframe src="{{ $video->video }}" frameborder="0" allowfullscreen></iframe>
          </div>
        </div> 
      @endforeach
    </div>
  </div>

	</div>
</div> 

@endsection