@extends('layouts.master')

@section('content')

<div class="container">
     <div class="row">

     	<div class="card">
  <div class="card-header">
    {{ $user->name }}的照片
  </div>
    <div class="card-block row">
      @foreach($pictures as $picture)
          <div class="col-sm-3" style="padding:2px;">
            <a href="{{ $picture->picture }}"><img class="img-rounded img-responsive" style="width: 100%;" src="{{ $picture->picture }}" title="{{ $picture->describe }}"></a>
          </div>  
      @endforeach
    </div>
  </div>

	</div>
</div> 

@endsection