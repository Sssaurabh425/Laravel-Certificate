<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Certificate') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatable/datatables.min.js')}}"></script>
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <script type="text/javascript" src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script type="text/javascript" src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('certificate') }}">
                    {{ config('app.name', 'Certificate') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        @else
                        <li class="nav-item dropdown ml-5">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Sales <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('contacts') }}">
                                    Leads
                                </a>


                            </div>



                        </li>
                        <li class="nav-item dropdown ml-5">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Certification <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('teachers') }}">
                                    Leads
                                </a>
                                <a class="dropdown-item" href="{{ route('course') }}">
                                    Add Certificate
                                </a>
                                <a class="dropdown-item" href="{{ route('certificate') }}">
                                    Generate Certificate
                                </a>


                            </div>



                        </li>
                        <li class="nav-item dropdown ml-5">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                                @endif
                            </div>



                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <script type="text/javascript">
            toastr.error('{{$error}}')
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
            })
        </script>
        @endif



        <main class="py-4">
            <div class="row">
                <div class="col-md-12">
                    @if(session('sucssucsMsg'))
                    <div class="alert alert-success">
                        {{session('sucssucsMsg')}}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}
                    </div>
                    @endif

                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>

</html>