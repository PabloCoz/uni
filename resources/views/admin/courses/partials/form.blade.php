<div class="mb-4">
    {!! Form::label('title', 'Título del curso') !!}
    {!! Form::text('title', null, [
        'class' => 'rounded w-full mt-1' . ($errors->has('title') ? ' border-red-600' : ''),
    ]) !!}

    @error('title')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['class' => 'rounded w-full mt-1', 'readonly']) !!}

    @error('slug')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso') !!}
    {!! Form::textarea('description', null, [
        'class' => 'rounded w-full mt-1' . ($errors->has('description') ? ' border-red-600' : ''),
    ]) !!}

    @error('description')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="grid grid-cols-2 lg:grid-cols-2 gap-4">
    <div>
        {!! Form::label('modality_id', 'Modalidad') !!}
        {!! Form::select('modality_id', $modalities, null, ['class' => 'rounded w-full mt-1']) !!}
        @error('modality_id')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>

    <div>
        {!! Form::label('hours', 'Cantidad de horas') !!}
        {!! Form::number('hours', null, ['class' => 'rounded w-full mt-1']) !!}
        @error('hours')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>

</div>

<div class="grid grid-cols-2 lg:grid-cols-2 gap-4">
    <div>
        {!! Form::label('start_date', 'Fecha Inicio') !!}
        {!! Form::date('start_date', null, ['class' => 'rounded w-full mt-1']) !!}
        @error('start_date')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
    
    <div>
        {!! Form::label('end_date', 'Fecha Fin') !!}
        {!! Form::date('end_date', null, ['class' => 'rounded w-full mt-1']) !!}
        @error('end_date')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>

</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}"
                alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="" alt="">
        @endisset
    </figure>

    <div>
        {!! Form::file('file', ['class' => 'rounded w-full ', 'id' => 'file', 'accept' => 'image/*']) !!}

        @error('file')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div>
