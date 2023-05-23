<div class="mt-5">
    <h2 class="font-semibold text-lg mb-5">Sessiones del taller</h2>
    @foreach ($workshop->sessions as $item)
        <article class="overflow-hidden shadow rounded-lg mb-6">
            <div class="px-3 py-4 bg-gray-100">
                @if ($session->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="session.name" type="text" class="w-full rounded" placeholder="Ingrese nombre del módulo">

                        @error('session.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 class="cursor-pointer"><strong>Sesión: </strong>{{$item->name}}</h1>

                        <div>
                            <i wire:click="edit({{$item}})" class="cursor-pointer text-blue-500 fas fa-edit"></i>
                            <i wire:click="destroy({{$item}})" class="cursor-pointer text-red-500 fas fa-trash"></i>
                        </div>
                    </header>

                    <div>
                        {{-- @livewire('admin.courses.lessons.lesson-index', ['module' => $item], key($item->id)) --}}
                    </div>

                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{open : false}">
        <a x-show="!open" @click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-3xl mr-1 text-blue-600"></i>
            <h3 class="text-lg font-semibold">Agregar Sesión</h3>
        </a>

        <article class="overflow-hidden shadow rounded-lg mt-2" x-show="open">
            <div class="px-3 py-4 bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva sesión</h1>

                <div>
                    <input wire:model="name" type="text" class="w-full rounded" placeholder="Escriba el nombre de la sesión">

                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-2">
                    <button class="block p-2 rounded text-white font-bold bg-red-500" @click="open = false">Cancelar</button>
                    <button class="block p-2 rounded text-white font-bold bg-green-500 ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
