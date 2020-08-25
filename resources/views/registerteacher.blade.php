<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <script type="text/javascript" src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script type="text/javascript" src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

</head>

<body style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);">


    <div class="register">
        <div class="row" style="margin:18px;">
            <div class="col-md-3 register-left">
                <img style="width: 50%;" src="{{asset('image/teacher.png')}}" alt="" />
                <h2>Welcome</h2>
                <h4>You are one step away from becoming a smart teacher!</h4>
                <a href="{{ route('login') }}"><input type="button" class="btn btn-primary" name="" value="Login" /></a><br />

            </div>
            <div class="col-md-9 register-right">
                <div class="float-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active entity" data-value="Individual" data-toggle="tab" href="#">Individual</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link entity" data-value="Institutional" data-toggle="tab" href="#">Institutional</a>
                        </li>
                    </ul>
                </div>
                <div class="m-auto text-center">
                    <div class="tab-content" id="myTabContent">


                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading"><b>Apply For <span id="ent">Individual</span> Training & Certification</b></h3>
                            <div class="row register-form">

                                <form role="form" id="saveteacher" method="post" action="{{route('saveteacher')}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="teachername" name="teachername" class="form-control" placeholder="Full Name *" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" id="teacheremail" name="teacheremail" class="form-control" placeholder="Email *" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="mobileno" name="mobileno" class="form-control" placeholder="Phone Number *" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="institutionname" name="institutionname" class="form-control" placeholder="Institution Name *" value="" />
                                            </div>
                                        </div>
                                        <input type="hidden" id="entityvalue" name="entityvalue" value="Individual" />
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" name="selectlevel" id="selectlevel">
                                                    <option value="" selected>Select Certification Level</option>
                                                    <option value="beginner">Beginner</option>
                                                    <option value="intermediate">Intermediate</option>
                                                    <option value="advanced">Advanced</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="city" name="city" class="form-control" placeholder="City *" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="state" name="state" class="form-control" placeholder="State *" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btnRegister">Register</button>                               </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <script type="text/javascript">
            toastr.error('{{$error}}');
        </script>
        @endforeach
        @endif

        @if ( Session::has('flash_message') )
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                timer: 3000,
                padding: '1em',
                showConfirmButton: false,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });


            Toast.fire({
                icon: "{{ Session::get('flash_type') }}",
                title: "<h6><b>{{ Session::get('flash_message') }}</b></h6>"
            });
        </script>
        @endif
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $.validator.setDefaults({
                submitHandler: function(form) {
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
                    mobileno: {
                        required: true
                    },
                    selectlevel: {
                        required: true
                    },
                    institutionname: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    state: {
                        required: true
                    }
                    
                },
                messages: {
                    teachername: {
                        required: "Enter Teacher Name",
                        minlength: "Please, at least {0} characters are necessary"
                    },
                    teacheremail: {
                        required: "Enter Teacher Email",
                        email: "Please, Enter Valid Email"
                    },
                    mobileno: {
                        required: "Enter Phone No."
                    },
                    selectlevel: {
                        required: "Select Level Of Certification"
                    },
                    institutionname: {
                        required: "Enter Institution Name"
                    },
                    city: {
                        required: "Enter City"
                    },
                    state: {
                        required: "Enter State"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('body').on('click', '.entity', function(event) {
            var entity_value = $(this).attr('data-value');
            $('#entityvalue').val(entity_value);
            $('#ent').html(entity_value);
        });
    </script>
</body>

</html>