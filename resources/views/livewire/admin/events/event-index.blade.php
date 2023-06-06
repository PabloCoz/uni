<div>
    <input wire:model="search" type="search" placeholder="Buscar..."
        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

    <div class="relative overflow-x-auto rounded-lg mt-4">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Evento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de Inicio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de Fin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $event->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $event->event_time }}
                        </td>
                        <td>
                            <div class="space-x-2">
                                <a href="{{ route('admin.events.edit', $event) }}">
                                    <i class="fa-solid fa-pen-to-square text-blue-500 text-lg cursor-pointer"></i>
                                </a>
                                <a href="{{ route('admin.events.show', $event) }}">
                                    <i class="fa-solid fa-eye text-green-700 text-lg cursor-pointer"></i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <i class="fa-solid fa-trash text-red-500 text-lg cursor-pointer"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b">
                        <td colspan="5" class="px-6 py-4 text-center">
                            No hay eventos que coincidan con la búsqueda
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-5">
            {{ $events->links() }}
        </div>
    </div>
</div>
