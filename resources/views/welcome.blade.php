@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

<div class="container">
    <div class="row">
        <div id="login-box">
            <div class="left-box">
                <h1> Sign Up</h1>

                <input type="text" name="username" placeholder="Username" />
                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />

                <input type="password" name="password2" placeholder="Retype password" />

                <input type="submit" name="signup-button" value="Sign Up" />

            </div>
            <div class="right-box">
                <span class="signinwith">Certificate<br />Teacher </span>




            </div>
            <div class="or">OR</div>
        </div>
    </div>

</div>




@endsection