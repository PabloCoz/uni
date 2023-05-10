<div class="mb-4">
    {!! Form::label('title', 'Título del taller') !!}
    {!! Form::text('title', null, [
        'class' => 'rounded w-full mt-1' . ($errors->has('title') ? ' border-red-600' : ''),
    ]) !!}

    @error('title')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del taller') !!}
    {!! Form::text('slug', null, ['class' => 'rounded w-full mt-1', 'readonly']) !!}

    @error('slug')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del taller') !!}
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
    </div>

    <div>
        {!! Form::label('schedule_id', 'Horarios') !!}
        {!! Form::select('schedule_id', $schedules, null, ['class' => 'rounded w-full mt-1']) !!}
    </div>

</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del taller</h1>

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
