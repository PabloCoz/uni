<x-admin-layout>
    <div class="max-w-6xl mx-auto lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Editar usuario</h1>
        </div>

        <div class="mt-5">
            <article class="overflow-hidden bg-white rounded-lg shadow-lg">
                <div class="p-3">
                    <h1 class="font-bold">Nombre: </h1>
                    <p class="my-2">{{ $user->profile->name . ' ' . $user->profile->lastname }}</p>
                    <h1 class="text-xl font-bold my-2">Lista de roles</h1>

                    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                    @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1 rounded']) !!}
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach

                    {!! Form::submit('Asignar rol', ['class' => 'mt-3 p-3 rounded bg-blue-500 font-bold text-white']) !!}
                    {!! Form::close() !!}
                </div>
            </article>
        </div>
    </div>
</x-admin-layout>
