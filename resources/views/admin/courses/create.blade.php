<x-admin-layout>
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Lista de Cursos</h1>
        </div>

        <div class="mt-5">

            {!! Form::open(['route' => 'admin.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @include('admin.courses.partials.form')
            <div class="flex justify-end">
                {!! Form::submit('Crear Curso', [
                    'class' => 'bg-green-500 block text-white font-bold rounded p-3 cursor-pointer hover:bg-green-700',
                ]) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    @push('form')
        <script src="{{ asset('js/form.js') }}"></script>
    @endpush
</x-admin-layout>
