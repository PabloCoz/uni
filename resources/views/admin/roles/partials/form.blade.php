<div class="my-4">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'w-full rounded' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escribir rol']) !!}

    @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>


<strong class="mt-4">Permisos</strong>
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'rounded mr-1']) !!}
            {{$permission->name}}
        </label>
    </div>
@endforeach

@error('permissions')
    <small class="text-danger">
        <strong>{{$message}}</strong>
    </small>
@enderror