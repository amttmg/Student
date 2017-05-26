<form method="post">
  {{ csrf_field() }}
  <input type="hidden" name="id" value="{{@$student->id}}">
  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">Full Name:</label>
    <input value="{{ old('name', @$student->name) }}" type="text" class="form-control" id="name" name="name">
    @if ($errors->has('name'))
      <div class="help-block">
        {{ $errors->first('name') }}
      </div>
    @endif
  </div>
  <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address">Address</label>
    <input value="{{ old('address', @$student->address) }}" type="text" class="form-control" id="address"
           name="address">
    @if ($errors->has('address'))
      <div class="help-block">
        {{ $errors->first('address') }}
      </div>
    @endif
  </div>

  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone">Phone</label>
    <input value="{{ old('phone', @$student->phone) }}" type="text" class="form-control" id="phone" name="phone">
    @if ($errors->has('phone'))
      <div class="help-block">
        {{ $errors->first('phone') }}
      </div>
    @endif
  </div>


  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email">Email</label>
    <input value="{{ old('email', @$student->email) }}" type="email" class="form-control" id="email" name="email">
    @if ($errors->has('email'))
      <div class="help-block">
        {{ $errors->first('email') }}
      </div>
    @endif
  </div>

  <div class="form-group {{ $errors->has('course') ? 'has-error' : '' }}">
    @foreach($courses as $course)
      <div class="checkbox">
        <label>
          <input
              class="chk_course"
              name="course[]"
              value="{{ $course->id }}"
              @if(in_array( $course->id, (old('course'))?old('course'):[])) checked @endif
              @if(@$student)
              @if(in_array( $course->id, (array_pluck(@$student->courses, 'id'))?array_pluck(@$student->courses, 'id'):[])) checked
              @endif
              @endif
              type="checkbox">
          {{ $course->name }}
        </label>
      </div>
    @endforeach

    @if ($errors->has('course'))
      <div class="help-block">
        {{ $errors->first('course') }}
      </div>
    @endif
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>