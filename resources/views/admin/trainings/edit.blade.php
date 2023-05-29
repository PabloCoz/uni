<x-admin-layout>
    <div class="max-w-6xl mx-auto lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Editar Capacitación</h1>
        </div>

        <div class="mt-5">

            {!! Form::model($training, ['route' => ['admin.trainings.update', $training], 'method' => 'put', 'files' => true]) !!}


            @include('admin.trainings.partials.form')
            <div class="flex justify-end">
                {!! Form::submit('Actualizar información', [
                    'class' => 'bg-blue-500 block text-white font-bold rounded p-3 cursor-pointer',
                ]) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    @push('form')
        <script src="{{ asset('js/form.js') }}"></script>
    @endpush
</x-admin-layout>
