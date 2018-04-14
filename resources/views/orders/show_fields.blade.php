<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orders->id !!}</p>
</div>

<!-- U Id Field -->
<div class="form-group">
    {!! Form::label('u_id', 'U Id:') !!}
    <p>{!! $orders->u_id !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $orders->price !!}</p>
</div>

<!-- Services Field -->
<div class="form-group">
    {!! Form::label('services', 'Services:') !!}
    <p>{!! $orders->services !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $orders->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orders->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orders->updated_at !!}</p>
</div>

