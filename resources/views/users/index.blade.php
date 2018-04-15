@extends('admin.index')

@section('content')
    <div class="container-fluid">

        <div class="card mb-3">
            <div class="card-header">
                <h1><i class="fa fa-user"></i> Користувачі</h1></div>
            <div class="card-body">
                <div class="table table-striped table-bordered nowrap" style="width:100%">
                    @include('users.table')
                </div>
            </div>
            <div class="card-footer small text-muted">Оновлено {{date("Y-m-d H:i")}}</div>
        </div>
    </div>
@endsection

