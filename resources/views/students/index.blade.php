@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <div class="col-md-4">
              <form id="frm">
                {{ csrf_field() }}
              @foreach($courses as $course)
                <div class="checkbox">
                  <label><input class="chk_course" name="course[]" value="{{ $course->id }}"
                                type="checkbox"> {{ $course->name }}</label>
                </div>
              @endforeach
              </form>
            </div>
          </div>

          <div class="panel-body">
            <div id="response"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script>
    $('.chk_course').change(function() {
      $.ajax({
        url: '{{ url('getstudent') }}/',
        data: $('#frm').serialize(),
        success: function(response) {
          $('#response').html(response)
        }
      })
    })
  </script>
@endsection
