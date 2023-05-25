<x-admin-layout>
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Panel Principal</h1>
            <h1 class="font-bold">Bienvenido: {{ Auth::user()->profile->name }} {{ Auth::user()->profile->lastname }}</h1>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-3">
        <div class="bg-red-500 p-4"></div>
        <div class="bg-red-500 p-4"></div>
        <div class="bg-red-500 p-4"></div>
    </div>
</x-admin-layout>
