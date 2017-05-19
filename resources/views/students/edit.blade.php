@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        {{--// @include('layouts/errors')--}}
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">Student Edit</div>
          </div>

          <div class="panel-body">
            @include('students/form');
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
