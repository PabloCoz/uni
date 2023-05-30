<x-admin-layout>
    <div class="bg-white overflow-hidden rounded-lg shadow-lg">

        <div class="p-4">
            <h1 class="text-2xl font-bold">
                Creacion de un nuevo rol
            </h1>
            <hr class="mt-2 mb-6 border border-gray-800">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            @include('admin.roles.partials.form')
        </div>
        <div class="flex items-center justify-end p-4">
            {!! Form::submit('Crear Rol', ['class' => 'p-3 rounded-md bg-blue-600 text-white font-bold']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</x-admin-layout>
