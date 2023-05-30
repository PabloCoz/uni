<x-admin-layout>
    <div class="max-w-6xl mx-auto lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Crear Taller</h1>
        </div>

        <div class="mt-5">

            {!! Form::open(['route' => 'admin.workshops.store', 'files' => true, 'autocomplete' => 'off']) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @include('admin.workshops.partials.form')
            <div class="flex justify-end">
                {!! Form::submit('Crear Taller', [
                    'class' => 'bg-green-600 block text-white font-bold rounded p-3 cursor-pointer hover:bg-green-700',
                ]) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    @push('form')
        <script src="{{ asset('js/form.js') }}"></script>
    @endpush
</x-admin-layout>
