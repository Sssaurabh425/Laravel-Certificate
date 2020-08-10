@extends('layouts.app')

@section('content')
<style>
  .classes-box {
    position: relative;
    border: 1px solid transparent;
    overflow: hidden;
    background-color: #fff;
    box-shadow: 0px 1px 7px gainsboro;
    transition: 300ms;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Add Certificate
        </div>
        <div class="card-body">
          <form role="form" id="saveteacher" method="post" action="{{route('saveteacher')}}">
            @csrf
            <div class="form-group">
              <label for="teachername">Teacher Name</label>
              <input type="text" class="form-control" id="teachername" placeholder="Enter Teacher Name" name="teachername">
            </div>
            <div class="form-group">
              <label for="teachername">Teacher Email</label>
              <input type="email" class="form-control" id="teacheremail" placeholder="Enter Teacher Email" name="teacheremail">
            </div>
            <div class="form-group">
              <label for="selectcourse">Select Course</label>
              <select class="form-control" name="selectcourse" id="selectcourse">
                <option value="">Select Course</option>
                @foreach ($course as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
              </select>
            </div>
            <!--div class="form-group">
              <label for="selectcourse">Select Course</label>
              <select class="form-control" name="selectcourse" id="selectcourse">
                <option>Smart Teacher Awareness Program</option>
                <option>Smart Teacher Training - Beginner</option>
                <option>Smart Teacher Training - Intermediate</option>
                <option>Smart Teacher Training - Advanced</option>
                <option>Smart Parent Training</option>
              </select>
            </!--div-->
            <div class="form-group">
              <label for="teacherdoc">Date of Certification</label>
              <input type="date" class="form-control" id="teacherdoc" placeholder="Enter Teacher DOB" name="teacherdoc">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg pl-5 pr-5 ">Submit</button>

            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12 mt-5">
      @if(count($teacher) > 0 ) <div class="card">
        <div class="card-header">
          All Certificate
        </div>
        <div class="card-body p-0">
          <table id="example" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
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
                <td>{{$t->email}}</td>
                <td>{{$t->course->name}}</td>
                <td>{{$t->dateofcertification}}</td>
                <td>{{$t->serialkey}}</td>
                <td><a target="_blank" href="{{route('createPDF',encrypt(['id'=>$t->id]))}}">View</a></td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
      @else
      <div class="classes-box  text-danger text-center">
        <svg class="icon icon-4x mr-3">
          <use xlink:href="../images/icons.svg#icon_nodate"></use>
        </svg>
        No Record Found!
      </div>
      @endif
    </div>

  </div>


</div>


</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      form.submit();
    }
  });
  $('#saveteacher').validate({
    rules: {
      teachername: {
        required: true,
        minlength: 5
      },
      teacheremail: {
        required: true,
        email: true
      },
      selectcourse: {
        required: true
      },
      teacherdoc: {
        required: true
      }
    },
    messages: {
      teachername: {
        required: "Enter Teacher Name",
        minlength: "Please, at least {0} characters are necessary"
      },
      teachername: {
        required: "Enter Teacher Email",
        email: "Please, Enter Valid Email"
      },
      selectcourse: {
        required: "Select Course"
      },
      teacherdoc: {
        required:"Select Date Of Certification"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endsection