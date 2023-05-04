<div>
    <input wire:model="search" type="search" placeholder="Buscar..."
        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

    <div class="relative overflow-x-auto rounded-lg mt-4">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre del Curso
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
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $course->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $course->hours }} horas
                        </td>
                        <td class="px-6 py-4">
                            {{ $course->modality->name }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($course->status == 1)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Elaboracion
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Publicado
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b">
                        <td colspan="4" class="px-6 py-4 text-center">
                            No hay cursos que coincidan con la búsqueda
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-5">
            {{ $courses->links() }}
        </div>
    </div>
</div>
