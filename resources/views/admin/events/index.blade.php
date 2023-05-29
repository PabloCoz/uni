<x-admin-layout>
    <div class="max-w-6xl mx-auto lg:px-8">
        <div class="block md:flex justify-between items-center space-y-2 md:space-y-0">
            <h1 class="text-2xl font-bold">Eventos</h1>
            <div>
                <a href="{{ route('admin.events.create') }}" class="bg-red-600 text-white p-2 rounded-md shadow font-bold">Nuevo Evento</a>
            </div>
        </div>
        <hr class="border border-gray-400 my-5">
        <div>
            @livewire('admin.events.event-index')
        </div>
    </div>
</x-admin-layout>