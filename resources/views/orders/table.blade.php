<table class="table table-bordered" id="dataTable" style="width: 100%; max-width: 100%;" cellspacing="0">
<thead>
        <tr>
            <th>Користувач</th>
        <th>Вього</th>
        <th>Послуги</th>
        <th>Статус</th>
            <th colspan="3">Дія</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Користувач</th>
        <th>Вього</th>
        <th>Послуги</th>
        <th>Статус</th>
        <th colspan="3">Дія</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($orders as $orders)
        <tr>
            <td>{!! $orders->u_id !!}</td>
            <td>{!! $orders->price !!} грн</td>
            <td>{!! $orders->services !!}</td>
            <td> {!! $orders->status ? "<i class='fa fa-check'></i>" : "<i class='fa fa-times'></i>" !!}</td>

            <td>

                      {!! Form::open(['route' => ['orders.destroy', $orders->id], 'method' => 'delete','class'=>'tform']) !!}
                    <a href="{!! route('orders.show', [$orders->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @if(!$orders->status)
                    {!! Form::open(['route' => ['orders.status', $orders->id], 'method' => 'POST','class'=>'tform']) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-check"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<style>
    .tform{
        float: left;
    }
</style>