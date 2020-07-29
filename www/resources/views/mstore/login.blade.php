@extends('layouts.layouts')
@section('content')
    <!-- login -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>LOGIN</h3>
            </div>
            <div class="login">
                <div class="row">
                    <form class="col s12" method="post" action="{{url('login/adddo')}}">
                        @csrf
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="USERNAME" name="user_name" required>
                        </div>
                        <div class="input-field">
                            <input type="password" class="validate" placeholder="PASSWORD" name="password" required>
                        </div>
                        <input type="submit" class="btn button-default" value="login">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->

@endsection