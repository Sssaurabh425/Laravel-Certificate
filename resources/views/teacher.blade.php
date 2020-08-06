@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 ">
      <div class="card">
        <div class="card-header">
          Add Certificate
        </div>
        <div class="card-body">
          <form role="form" method="post" action="{{route('saveteacher')}}">
            @csrf
            <div class="form-group">
              <label for="teachername">Teacher Name</label>
              <input type="text" class="form-control" id="teachername" placeholder="Enter Teacher Name" name="teachername">
            </div>
            <div class="form-group">
              <label for="selectcourse">Select Course</label>
              <select class="form-control" name="selectcourse" id="selectcourse">
                <option>Math</option>
                <option>English</option>
              </select>
            </div>
            <div class="form-group">
              <label for="teacherdoc">Date of Certification</label>
              <input type="date" class="form-control" id="teacherdoc" placeholder="Enter Teacher DOB" name="teacherdoc">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary ">Submit</button>

            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          All Certificate
        </div>
        <div class="card-body p-0">
          <table id="example" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Course Name</th>
                <th>Certification Date</th>
                <th>Serial Key</th>
                <th>Certificate</th>
              </tr>
            </thead>
            <tbody>
              @foreach($teacher as $t)
              <tr>
                <td>{{$t->id}}</td>
                <td>{{$t->name}}</td>
                <td>{{$t->coursename}}</td>
                <td>{{$t->dateofcertification}}</td>
                <td>{{$t->serialkey}}</td>
                <td><a target="_blank" href="{{route('createPDF',['id'=>$t->id])}}">View</a></td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>


</div>


</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
@endsection