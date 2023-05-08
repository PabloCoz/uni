<x-admin-layout>
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Lista de Horarios</h1>
            <div>
                <a href="{{ route('admin.schedules.create') }}"
                    class="bg-red-600 text-white p-2 rounded-md shadow font-bold">Nuevo Horario</a>
            </div>
        </div>
        <hr class="border border-black my-5">
        <div>
            <ul>
                @foreach ($schedules as $schedule)
                    <li class="flex justify-between items-center">
                        <div>
                            <p class="font-bold">{{ $schedule->date }}</p>
                            <p class="text-sm">{{ $schedule->start }} - {{ $schedule->end }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.schedules.edit', $schedule) }}"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">Editar</a>
                            <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Eliminar</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-admin-layout>
