@extends('layouts.layouts')
@section('content')
    <!-- register -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>REGISTER</h3>
            </div>
            <div class="register">
                <div class="row">
                    <form class="col s12" method="post" action="{{url('reg/adddo')}}">
                        @csrf
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="NAME" name="user_name" required>
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="PASSWORD" class="validate" name="password" required>
                        </div>
                        <input type="submit" value="register" class="btn button-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end register -->

@endsection