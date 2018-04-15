<table class="table table-bordered" id="dataTable" style="width: 100%; max-width: 100%;" cellspacing="0">
    <thead>
    <tr>
        <th>Ім'я</th>
        <th>Email</th>
        <th>Електронна пошта</th>
        <th>Зображення</th>
        <th>Дія</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Ім'я</th>
        <th>Email</th>
        <th>Електронна пошта</th>
        <th>Зображення</th>
        <th>Дія</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($users as $users)
        <tr>
            <td>{!! $users->name !!}</td>
            <td>{!! $users->email !!}</td>
            <td>{!! $users->telephone !!}</td>
            <td><a href="{!! asset('images/users') . '/' . $users->image !!}">Фото</a></td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>