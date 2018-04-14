@extends('layouts.app')

@section('content')
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <div class="login">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 col-lg-offset-3" style="margin: 0 auto; padding-top:8%;">

                <div class="inner-form">
                    <form role="form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <label>Email</label>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label>Password</label>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-default">
                                    <span>LOGIN</span>
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <br>
                                Не маєте облікового запису!
                                <a href="{{route('register')}}"> Зареєструватися тут</a>
                            </div>
                        </div>
                    </form>

                </div> <!-- inner-form -->

            </div>
            </div>
        </div>
    </div>
@endsection
