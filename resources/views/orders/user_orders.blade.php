@extends('layouts.app')

@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <style>
        .timeline {
            position: relative;
            padding: 21px 0px 10px;
            margin-top: 4px;
            margin-bottom: 30px;
        }

        .timeline .line {
            position: absolute;
            width: 4px;
            display: block;
            background: currentColor;
            top: 0px;
            bottom: 0px;
            margin-left: 30px;
        }

        .timeline .separator {
            border-top: 1px solid currentColor;
            padding: 5px;
            padding-left: 40px;
            font-style: italic;
            font-size: .9em;
            margin-left: 30px;
        }

        .timeline .line::before { top: -4px; }
        .timeline .line::after { bottom: -4px; }
        .timeline .line::before,
        .timeline .line::after {
            content: '';
            position: absolute;
            left: -4px;
            width: 12px;
            height: 12px;
            display: block;
            border-radius: 50%;
            background: currentColor;
        }

        .timeline .panel {
            position: relative;
            margin: 10px 0px 21px 70px;
            clear: both;
        }

        .timeline .panel::before {
            position: absolute;
            display: block;
            top: 8px;
            left: -24px;
            content: '';
            width: 0px;
            height: 0px;
            border: inherit;
            border-width: 12px;
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-left-color: transparent;
        }

        .timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
        .timeline .panel .panel-heading.icon {
            position: absolute;
            left: -59px;
            display: block;
            width: 40px;
            height: 40px;
            padding: 0px;
            border-radius: 50%;
            text-align: center;
            float: left;
        }

        .timeline .panel-outline {
            border-color: transparent;
            background: transparent;
            box-shadow: none;
        }

        .timeline .panel-outline .panel-body {
            padding: 10px 0px;
        }

        .timeline .panel-outline .panel-heading:not(.icon),
        .timeline .panel-outline .panel-footer {
            display: none;
        }
        .minimum{
            min-height: 80vh;
        }
    </style>
<div class="container minimum">

    <!-- Page header -->
    <div class="page-header">
        <h2>Замовлення <small> {{ Auth::user()->name }}</small></h2>
    </div>
    <!-- /Page header -->

    <!-- Timeline -->
    <div class="timeline">

        <!-- Line component -->
        <div class="line text-muted"></div>

        <!-- Separator -->
        <div class="separator text-muted">
            <time>{{ date('d . m . Y') }}</time>
        </div>
        <!-- /Separator -->
        @include('flash::message')
        @foreach($orders as $order)
        <!-- /Panel -->
        <article class="panel panel-{{  $order->status == 1 ? "success" : "primary"}}">

            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->

            <!-- Heading -->
            <div class="panel-heading">
                @if(!$order->status)
                    <div style="float: right">
                        {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Ви впевнені?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                @endif
                <h2 class="panel-title">{!! $order->created_at->format('H:i:s  d.m.Y')  !!}</h2>

            </div>
            <!-- /Heading -->

            <!-- Body -->
            <div class="panel-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Назва</th>
                        <th scope="col">Кількість</th>
                        <th scope="col">Ціна</th>
                    </tr>
                    </thead>
                    @foreach(explode(",", $order->services) as $item)
                                <tr>
                                    <td>
                                        Послуга {!! explode("|",$item)[0] !!}
                                    </td>
                                    <td>
                                        {!! explode("|",$item)[1] !!}
                                    </td>
                                    <td>
                                        {!! explode("|",$item)[1] * 50!!}
                                    </td>
                                </tr>
                    @endforeach
                </table>
            </div>
            <!-- /Body -->

            <!-- Footer -->
            <div class="panel-footer">
                <big><strong>Загальна вартість {!! $order->price !!} грн</strong></big>
            </div>
            <!-- /Footer -->

        </article>
    @endforeach

    </div>
    <!-- /Timeline -->

</div>
</div>
    @endsection