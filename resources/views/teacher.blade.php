@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 mt-5">
      @if(count($teacher) > 0 ) <div class="card">
        <div class="card-header">
          All Teacher
        </div>
        <div class="card-body p-0">
          <table id="example" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Entity</th>
                <th>Certification Level</th>
              </tr>
            </thead>
            <tbody>
              @foreach($teacher as $t)
              <tr>
                <td>{{$t->id}}</td>
                <td>{{$t->name}}</td>
                <td>{{$t->email}}</td>
                <td>{{$t->mobileno}}</td>
                <td>{{$t->entity}}</td>
                <td>{{$t->certificationlevel}}</td>
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
    $('#example').DataTable({
      responsive: true,
    });
  });
</script>

@endsection