<x-admin-layout>
    <div class="max-w-6xl mx-auto lg:px-8">
        <div class="block md:flex justify-between items-center space-y-2 md:space-y-0">
            <h1 class="text-2xl font-bold">Lista de Cursos</h1>
            <div>
                <a href="{{ route('admin.courses.create') }}" class="bg-red-600 text-white p-2 rounded-md shadow font-bold">Nuevo Curso</a>
            </div>
        </div>
        <hr class="border border-gray-400 my-5">
        <div>
            @livewire('admin.courses.course-index')
        </div>
    </div>
</x-admin-layout>
