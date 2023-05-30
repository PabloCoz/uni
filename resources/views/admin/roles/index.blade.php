<x-admin-layout>
    <div class="max-w-6xl mx-auto lg:px-8">
        <div class="block md:flex justify-between items-center space-y-2 md:space-y-0">
            <h1 class="text-2xl font-bold">Gestion de roles y permisos</h1>
            <div>
                <a href="{{ route('admin.roles.create') }}"
                    class="bg-red-600 text-white p-2 rounded-md shadow font-bold">Nuevo Rol</a>
            </div>
        </div>
        <hr class="border border-gray-400 my-5">
        <div>

            <div class="relative overflow-x-auto rounded-lg mt-4">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Rol
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Editar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Eliminar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                    {{ $role->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.roles.edit', $role) }}">
                                        <i class="fa-solid fa-pen-to-square text-blue-500 text-lg cursor-pointer"></i>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            <i class="fa-solid fa-trash text-red-500 text-lg cursor-pointer"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b">
                                <td colspan="4" class="px-6 py-4 text-center">
                                    No hay roles registrados
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin-layout>
