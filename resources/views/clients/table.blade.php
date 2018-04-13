<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<table class="table table-responsive" id="clients-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Age</th>
        <th>Foto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $clients)
        <tr>
            <td>{!! $clients->name !!}</td>
            <td>{!! $clients->age !!}</td>
            <td>{!! $clients->foto !!}</td>
            <td>
                {!! Form::open(['route' => ['clients.destroy', $clients->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('clients.show', [$clients->id]) !!}" class='btn btn-default btn-xs'> <i class="fas fa-eye"></i></a>
                    <a href="{!! route('clients.edit', [$clients->id]) !!}" class='btn btn-default btn-xs'> <i class="fas fa-pencil-alt"></i></a>
                    {!! Form::button(' <i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>