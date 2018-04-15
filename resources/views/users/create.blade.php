@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{asset('js/tabs.js')}}"></script>
    <style>
        .border {
            margin: 15px 0 15px 0;
        }

        .avatar {
            min-width: 150px;
            min-height: 150px;
            max-width: 150px;
            max-height: 150px;
        }


        #changeImg {
            background-color: #00a5f7;
            font-weight: bold;
            border: 2px solid #0000ff;
            color: white;
        }

        #changeImg:hover {
            background-color: #0000ff;
        }
        .main{
            margin-bottom: 50px;
            margin-top: 50px;
        }

    </style>
    <section class="container main">
    <div class="submit-ad main-grid-border">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center border">
                        <h1>Редагувати профіль</h1>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="{{ asset('images/users') . '/' . Auth::user()->image}}" class="avatar img-circle" alt="avatar">
                        <h4><i>Завантажте інше фото ...</i></h4>
                        <form id="uploadimg" method="POST" enctype="multipart/form-data"
                              action="{{ route("index")  }}">
                            {{ csrf_field() }}
                            <input type="file" name="image" type="file" accept="image/*" style="visibility: hidden">
                        </form>
                        <input id="changeImg" type="button" class="btn btn-default form-control" value="Змінити">
                    </div>
                </div>
                <div class="col-md-9 personal-info">
                    @if (session('status'))
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a>
                            <i class="fa fa-coffee"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                            <strong>{{session('status')}}</strong>
                        </div>
                    @endif
                    <div class="text-center border">
                        <h3>Особиста інформація</h3>
                    </div>

                    <form method="POST" action="{{route('index')}}" class="form-horizontal" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Місто:</label>
                            <div class="col-lg-8">
                                <input required name="city" class="form-control" type="text" value="{{Auth::user()->city}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Номер мобільного:</label>
                            <div class="col-lg-8">
                                <input pattern=".{12,12}" required name="telph" maxlength="12" class="form-control" type="text" value="{{Auth::user()->telph}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input name="email" required class="form-control" type="text" value="{{Auth::user()->email}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ім'я користувача:</label>
                            <div class="col-md-8">
                                <input name="name" required class="form-control" type="text" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Старий пароль:</label>
                            <div class="col-md-8">
                                <input name="password" class="form-control" type="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Новий пароль:</label>
                            <div class="col-md-8">
                                <input name="newpassword" class="form-control" type="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Підтвердити новий пароль:</label>
                            <div class="col-md-8">
                                <input name="newpasswordconf" class="form-control" type="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input id="changeImg" type="submit" class="btn btn-default form-control"
                                       value="Зберегти зміни">
                            </div>
                        </div>
                    </form>
                </div>
                <hr style="padding: 10px">
            </div>
        </div>
        <div id="loader-container">
            <div id="loader"></div>
        </div>
    </div>
    </section>
    <script type='text/javascript'>
        document.addEventListener("DOMContentLoaded", function(event) {
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#changeImg').on('click', function () {
                $('input[type=file]').click();
            });
            $("input:file").change(function () {
                if ($(this).val()) {
                    $('#uploadimg').submit();
                }
            });

            $('#uploadimg').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                $.ajax({
                    url: '<?= route("index")?>',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                    beforeSend: function () {
                        $('#loader-container').show();
                    },
                    success: function (e) {
                        $('#loader-container').hide();
                        location.reload();
                    },
                    error: function (e) {
                        console.log(e);
                        $('#loader-container').hide();

                    }
                });
            });

        });
        });
    </script>
@endsection
