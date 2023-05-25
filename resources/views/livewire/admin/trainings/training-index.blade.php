<div>
    <input wire:model="search" type="search" placeholder="Buscar..."
        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

    <div class="relative overflow-x-auto rounded-lg mt-4">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre de la capacitación
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Horas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Modalidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trainings as $training)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $training->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $training->hours }} horas
                        </td>
                        <td class="px-6 py-4">
                            {{ $training->modality->name }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($training->status == 1)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Elaboracion
                                </span>
                            @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Publicado
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="space-x-2">
                                <a href="{{ route('admin.trainings.edit', $training) }}">
                                    <i class="fa-solid fa-pen-to-square text-blue-500 text-lg cursor-pointer"></i>
                                </a>
                                <a href="{{ route('admin.trainings.show', $training) }}">
                                    <i class="fa-solid fa-eye text-green-700 text-lg cursor-pointer"></i>
                                </a>
                                <form action="{{ route('admin.trainings.destroy', $training) }}" method="POST"
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
                        <td colspan="4" class="px-6 py-4 text-center">
                            No hay capacitaciones que coincidan con la búsqueda
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-5">
            {{ $trainings->links() }}
        </div>
    </div>
</div>
