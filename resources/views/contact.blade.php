@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            @if(count($contact) > 0 ) <div class="card">
                <div class="card-header">
                    All Contacts
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
                                <th>Institution Name</th>
                                <th>Contact Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($contact as $t)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$t->name}}</td>
                                <td><a href="mailto:{{$t->email}}">{{$t->email}}</a></td>
                                <td><a href="tel:{{$t->mobileno}}">{{$t->mobileno}}</td>
                                <td>{{$t->entity}}</td>
                                <td>{{$t->institutionname}}</td>
                                <td>{{$t->created_at}}</td>
                                <td>
                                    <select data-id="{{$t->id}}" class="form-control contact_status">
                                        <option value="Contacted" {{ ( "Contacted" == $t->status) ? 'selected' : '' }}>Contacted</option>
                                        <option value="Pending" {{ ( "Pending" == $t->status) ? 'selected' : '' }}>Pending</option>
                                        
                                    </select>
                                </td>
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
            "order": [
                [6, "desc"]
            ]
        });
    });
    $('body').on('change', '.contact_status', function() {
        var contact_status = $(this).val();
        var contact_id = $(this).attr('data-id');
        $.ajax({
            type: "post",
            dataType: "json",
            url:"{{route('updatecontactstatus')}}",
            data: {'contact_status': contact_status, 'contact_id': contact_id}
        });
    });	
</script>

@endsection