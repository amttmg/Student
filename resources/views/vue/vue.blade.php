<html>
<head>
  <title>Vue JS</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="container" style="margin-top: 20px">
  <div class="row" id="app">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          Entry Form
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="name">Student Name</label>
            <input type="text" name="name" class="form-control" v-model.lazy="studentData.name">
          </div>
          <div class="form-group">
            <label for="name">Phone</label>
            <input type="text" name="phone" class="form-control" v-model.lazy="studentData.phone">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" v-model.lazy="studentData.email">
          </div>
          <div class="form-group">
            <label for="email">Gender</label>
            <div class="radio">
              <label><input value="Male" type="radio" v-model="studentData.gender"> Male</label>
            </div>
            <div class="radio">
              <label><input value="Female" type="radio" v-model="studentData.gender"> Female</label>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Course</label>
            <div class="checkbox" v-for="item in courses">
              <label><input type="checkbox" v-model="studentData.course" :value="item"> @{{ item }}</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          Data Display
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <tr>
              <th>Name</th>
              <td>@{{ studentData.name }}</td>
            </tr>
            <tr>
              <th>phone</th>
              <td>@{{ studentData.phone }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>@{{ studentData.email }}</td>
            </tr>
            <tr>
              <th>Gender</th>
              <td>@{{ studentData.gender }}</td>
            </tr>
            <tr>
              <th>Course</th>
              <td>
                <ul>
                  <li v-for="item in studentData.course">@{{ item }}</li>
                </ul>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script src="https://unpkg.com/vue" type="text/javascript"></script>
<script>
  const vue = new Vue({
    el: '#app',
    data: {
      studentData: {
        name: '',
        phone: '',
        email: '',
        gender: '',
        course: []
      },
      courses: ['MBBS', 'BSC', 'BE', 'BSCCSIT']
    }
  })
</script>
</html>