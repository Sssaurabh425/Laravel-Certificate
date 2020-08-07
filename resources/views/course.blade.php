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
          Add Course
        </div>
        <div class="card-body">
          <form role="form" method="post" action="{{route('savecourse')}}">
            @csrf
            <div class="form-group">
              <label for="coursename">Course Name</label>
              <input type="text" class="form-control" id="teachername" placeholder="Enter Course Name" name="coursename">
            </div>
            <div class="form-group">
              <label for="coursedesc">Select Course</label>
              <textarea class="form-control" id="coursedesc" name="coursedesc" rows="4"><div style="font-size:22px;color:#777777;"><span>For actively participating in</span><br><span><b>" Teacher Webinar "</b> Conducted by</span> <br><span>Mr. Sandip Mitra representing e-Edport</span></div></textarea>
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
              <input type="file" class="form-control" id="asignature" placeholder="Enter Anchor Signature" name="asignature">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg pl-5 pr-5 ">Submit</button>

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
              </tr>
            </thead>
            <tbody>
              @foreach($course as $c)
              <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->description}}</td>
                <td>{{$c->aname}}</td>
                <td>{{$c->arole}}</td>
                <td>{{$c->asignature}}</td>
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
@endsection