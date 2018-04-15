<table class="table table-bordered" id="dataTable" style="width: 100%; max-width: 100%;" cellspacing="0">
    <thead>
    <tr>
        <th>Формат</th>
        <th>Ціна</th>
        <th>Назва</th>
        <th colspan="3">Дія</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Формат</th>
        <th>Ціна</th>
        <th>Назва</th>
        <th colspan="3">Дія</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td>{!! $service->format !!}</td>
            <td>{!! $service->price !!}</td>
            <td>{!! $service->name !!}</td>
            <td>
                {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('services.show', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('services.edit', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>