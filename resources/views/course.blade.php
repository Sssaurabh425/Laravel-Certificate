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
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Add Course
        </div>
        <div class="card-body">
          <form role="form" id="savecourse" method="post" enctype="multipart/form-data" action="{{route('savecourse')}}">
            @csrf
            <div class="form-group">
              <label for="coursename">Course Name</label>
              <input type="text" class="form-control" id="teachername" placeholder="Enter Course Name" name="coursename">
            </div>
            <div class="form-group">
              <label for="coursedesc">Course Description</label>
              <textarea class="form-control ckeditor" id="coursedesc" name="coursedesc" rows="4"><div style="font-size:22px;color:#777777;"><span>For actively participating in</span><br><span><b>" Teacher Webinar "</b> Conducted by</span> <br><span>Mr. Sandip Mitra representing e-Edport</span></div></textarea>
            </div>
            <div class="form-group">
              <label for="aname">Anchor Name</label>
              <input type="text" class="form-control" id="aname" placeholder="Enter Anchor Name" name="aname">
            </div>
            <div class="form-group">
              <label for="arole">Anchor Role</label>
              <input type="text" class="form-control" id="arole" placeholder="Enter Anchor Role" name="arole">
            </div>
            <div class="form-group">
              <label for="coursename">Anchor Signature</label>
              <input type="file" class="form-control" id="asignature" accept="image/*" placeholder="Enter Anchor Signature" name="asignature">
            </div>
            <div class="header-btn rounded-buttons text-center">
              <button type="submit" class="main-btn rounded-three pl-5 pr-5 ">Submit</button>

            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12 mt-5">
      @if(count($course) > 0 ) <div class="card">
        <div class="card-header">
          All Course
        </div>
        <div class="card-body p-0">
          <table id="example" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Anchor Name</th>
                <th>Anchor role</th>
                <th>Anchor Signature</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($course as $c)
              <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{!!$c->description!!}</td>
                <td>{{$c->aname}}</td>
                <td>{{$c->arole}}</td>
                <td><img width="80" src="{{URL::to('/')}}/<?php echo $c->asignature; ?>" /></td>
                <td><button type="button" data-id="{{$c->id}}" class="btn btn-primary btn-sm editcourse" data-toggle="modal" data-target="#modal-edit-course">Edit</button></td>
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
<!-- Dashboard-NoticeModal -->
<div class="modal fade" id="modal-edit-course">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Course</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="editcourse" enctype="multipart/form-data" method="post" action="{{route('updatecourse')}}">
          <div class="card-body">
            <input id="ecourseid" name="ecourseid" type="hidden" value="" />
            <div class="form-group">
              <label for="ecoursename">Name</label>
              <input type="text" name="ecoursename" id="ecoursename" class="form-control">
            </div>
            <div class="form-group">
              <label for="ecoursedesc">Description</label>
              <textarea id="ecoursedesc" name="ecoursedesc" class="form-control ckeditor" rows="5" placeholder="Enter Description..."></textarea>
            </div>
            <div class="form-group">
              <label for="eaname">Name</label>
              <input type="text" name="eaname" id="eaname" class="form-control">
            </div>
            <div class="form-group">
              <label for="earole">Description</label>
              <input type="text" name="earole" id="earole" class="form-control">
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="easignature">Signature</label>
                  <input type="file" name="easignature" id="easignature" class="form-control">
                </div>
              </div>
              <div class="col-md-4" name="easignatureimg" id="easignatureimg"></div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>
<!-- ./Dashboard-NoticeModal-->

</div>

<script type="text/javascript" src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
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
  $('#editcourse').validate({
    rules: {
      ecoursename: {
        required: true,
        minlength: 5
      },
      ecoursedesc: {
        required: true,
      },
      eaname: {
        required: true,
        minlength: 5
      },
      earole: {
        required: true,
        minlength: 5
      },
      easignature: {
        required: true,
        accept:"jpg,png,jpeg"
      },
    },
    messages: {
      ecoursename: {
        required: "Enter Course Name",
        minlength: "Please, at least {0} characters are necessary"
      },
      ecoursedesc: {
        required: "Enter Course Desc"
      },
      eaname: {
        required:"Enter Author Name",
        minlength: "Please, at least {0} characters are necessary"
      },
      earole: {
        required: "Enter Author Role",
        minlength: "Please, at least {0} characters are necessary"
      },
      easignature: {
        required:"Please Select Signature",
        accept: "Only image type jpg/png/jpeg is allowed"
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
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      form.submit();
    }
  });
  $('#savecourse').validate({
    rules: {
      coursename: {
        required: true,
        minlength: 5
      },
      coursedesc: {
        required: true
      },
      aname: {
        required: true,
        minlength: 5
      },
      arole: {
        required: true,
        minlength: 5
      },
      asignature: {
        required: true,
        accept:"jpg,png,jpeg"
      },
    },
    messages: {
      coursename: {
        required: "Enter Course Name",
        minlength: "Please, at least {0} characters are necessary"
      },
      coursedesc: {
        required: "Enter Course Desc"
      },
      aname: {
        required:"Enter Author Name",
        minlength: "Please, at least {0} characters are necessary"
      },
      arole: {
        required: "Enter Author Role",
        minlength: "Please, at least {0} characters are necessary"
      },
      asignature: {
        required:"Please Select Signature",
        accept: "Only image type jpg/png/jpeg is allowed"
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
<script>
  $('body').on('click', '.editcourse', function(event) {
    var course_id = $(this).attr('data-id');
    if (course_id) {
      $.ajax({
        url: "{{route('getcourse')}}",
        type: 'POST',
        dataType: "json",
        beforeSend: function(xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');
          if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
        },
        data: {
          'course_id': course_id
        },
        success: function(data) {
          if (data) {
            $('#ecourseid').val(data['id']);
            $('#ecoursename').val(data['name']);
            CKEDITOR.instances['ecoursedesc'].setData(data['description']);
            $('#eaname').val(data['aname']);
            $('#earole').val(data['arole']);
            $('#easignatureimg').html('<img width="80" src="{{URL::to('/')}}/' + data['asignature'] + '" />');

          }
        }
      });

    }
  });
</script>
@endsection