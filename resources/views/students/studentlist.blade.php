@if(count($courses))
  <table class="table table-bordered">
    @foreach($courses as $course)
      <tr>
        <td colspan="7" align="center"><strong>{{ $course->name }}</strong></td>
      </tr>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Course</th>
        <th>Action</th>
      </tr>
      @foreach($course->students as $student)
        <tr>
          <td>{{ $student->id }}</td>
          <td>{{ $student->name }}</td>
          <td>{{ $student->phone }}</td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->address }}</td>
          <td></td>
          <td>
          @can('edit', $student)
            <a href="{{ url('studentedit') }}/{{ $student->id }}">Edit</a>
          @endcan
          </td>
        </tr>
      @endforeach
    @endforeach
  </table>
@endif