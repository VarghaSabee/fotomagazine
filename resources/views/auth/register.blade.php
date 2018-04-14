@extends('layouts.app')

@section('content')
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <div class="login" style="height: 140vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3" style="margin: 0 auto; padding-top:8%;">

                    <div class="inner-form">
                        <form role="form" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12">
                                    <label>Електронна пошта</label>
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
                                    <label>Ім'я</label>
                                    <div class="form-group">
                                        <input type="text" name="name" id="password" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label>Пароль</label>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label>Підтвердити пароль</label>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-default">
                                        <span>Pеєструвати</span>
                                    </button>
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    або
                                    <a href="{{route('login')}}"> Bвійдіть</a>
                                </div>
                            </div>
                        </form>

                    </div> <!-- inner-form -->

                </div>
            </div>
        </div>
    </div>
@endsection
