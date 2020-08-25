@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Compose New Message
                </div>
                <div class="card-body">
                    <form role="form" id="sendmail" method="post" enctype="multipart/form-data" action="{{route('sendmail')}}">
                        @csrf
                        <label for="coursename">Filter</label>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="coursename">Entity</label>
                                <select class="form-control filter" name="entity" id="entity">
                                    <option value="">Select Entity</option>
                                    @foreach($contact->unique('entity') as $t)
                                    <option value="{{$t->entity}}">{{$t->entity}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="coursename">Institution Name</label>
                                <select class="form-control filter" name="institutionname" id="institutionname">
                                    <option value="">Select Institution Name</option>
                                    @foreach($contact->unique('institutionname') as $t)
                                    <option value="{{$t->institutionname}}">{{$t->institutionname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="coursename">Status</label>
                                <select class="form-control filter" name="status" id="status">
                                    <option value="">Select Status</option>
                                    @foreach($contact->unique('status') as $t)
                                    <option value="{{$t->status}}">{{$t->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mailto">To</label>
                            <select style="width:100%;" class="js-example-basic-multiple form-control" id="mailto" name="mailto[]" multiple="multiple">
                                
                                @foreach($contact->unique('email') as $t)
                                <option value="{{$t->email}}">{{$t->name}}[ {{$t->email}} ]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Subject:" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control ckeditor" id="message" name="message" rows="4"><div style="font-size:22px;color:#777777;"><span>For actively participating in</span><br><span><b>" Teacher Webinar "</b> Conducted by</span> <br><span>Mr. Sandip Mitra representing e-Edport</span></div></textarea>
                        </div>
                        <div class="form-group">
                            <label for="attachment">Attachment</label>
                            <input type="file" class="form-control" id="attachment" accept="image/*" placeholder="Enter Anchor Signature" name="attachment">
                        </div>
                        <div class="header-btn rounded-buttons text-center">
                            <button type="submit" class="main-btn rounded-three pl-5 pr-5 ">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      form.submit();
    }
  });
  $('#sendmail').validate({
    rules: {
      mailto: {
        required: true
      },
      subject: {
        required: true,
        minlength: 5
      },
      message: {
        required: true,
        minlength: 5
      }
    },
    messages: {
        mailto: {
        required: "Enter Mail"
      },
      subject: {
        required:"Enter Subject",
        minlength: "Please, at least {0} characters are necessary"
      },
      message: {
        required: "Enter Message",
        minlength: "Please, at least {0} characters are necessary"
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
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "To:",
            theme: "classic"
        });
    });
</script>
<script type="text/javascript" src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.filter').on('change', function() {
            var entity = $('#entity').val();
            var institutionname = $('#institutionname').val();
            var status = $('#status').val();
            $.ajax({
                url: "{{route('entitymail')}}",
                type: 'POST',
                dataType: "json",
                data: {
                    'entity': entity,
                    'institutionname': institutionname,
                    'status': status
                },
                success: function(data) {
                    var listItems1;
                    listItems1 += "<option value=''>Select Mail</option>";
                    for (var i = 0; i < data.length; i++) {
                        listItems1 += "<option value='" + data[i].email + "'>" + data[i].name + "</option>";
                    }

                    $("#mailto").html(listItems1);

                }
            });
        });
    });
</script>
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
            url: "{{route('updatecontactstatus')}}",
            data: {
                'contact_status': contact_status,
                'contact_id': contact_id
            }
        });
    });
</script>

@endsection