<div wire:init="loadLessons">
    @foreach ($module->lessons as $item)
        <article class="bg-white rounded-lg overflow-hidden mt-4" x-data="{ open: false }">
            <div class="px-6 py-4">
                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="block md:flex items-center">
                            <label class="w-32">Nombre: </label>
                            <input wire:model="lesson.name" type="text" class="rounded w-full">
                        </div>

                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="block md:flex items-center mt-4">
                            <label class="w-32">Plataforma: </label>
                            <select class="w-full rounded" wire:model="lesson.modality_id">
                                @foreach ($modalities as $modality)
                                    <option value="{{ $modality->id }}">{{ $modality->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="block md:flex items-center mt-4">
                            <label class="w-32">Descripción: </label>
                            <textarea wire:model="lesson.description" class="rounded w-full"></textarea>
                        </div>

                        @error('lesson.description')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        @if ($lesson->modality_id == 2)
                            <div class="block md:flex items-center mt-4">
                                <label class="w-32">URL: </label>
                                <input wire:model="lesson.url" type="text" class="rounded w-full">
                            </div>
                        @endif
                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type=" submit"
                                class="block rounded p-2 text-black font-bold text-sm bg-yellow-400">Actualizar</button>
                            <button type="button"
                                class="block rounded p-2 text-white font-bold text-sm bg-red-500 ml-1"
                                wire:click="cancel">Cancelar</button>
                        </div>
                    </form>
                @else
                    <header>
                        <h1 @click="open = !open" class="cursor-pointer"><i
                                class="far fa-play-circle text-red-500 mr-1"></i>Lección: {{ $item->name }}</h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">

                        <p class="text-sm">Plataforma: {{ $item->modality->name }}</p>
                        @if ($item->modality_id == 2)
                            <p class="text-sm">Enlace: <a class="text-blue-600 hover:underline"
                                    href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                            </p>
                        @endif

                        <div class="my-2 flex">
                            <button class="block rounded p-2 font-bold text-sm text-white bg-blue-500 mr-1"
                                wire:click="edit({{ $item }})">Editar</button>
                            <button class="block rounded p-2 font-bold text-sm text-white bg-red-500"
                                wire:click="destroy({{ $item }})">Eliminar</button>
                        </div>

                        <div>
                            @livewire('admin.courses.lessons.lesson-resource', ['lesson' => $item], key('lesson-resources' . $item->id))
                        </div>
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div class="mt-4" x-data="{ open: false }">
        <a x-show="!open" @click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-xl mr-1 text-red-600"></i>
            <h3 class="text-base font-semibold">Agregar Lecciones</h3>
        </a>

        <article class="bg-gray-100 rounded-lg overflow-hidden mt-2" x-show="open">
            <div class="px-6 py-4">
                <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>

                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre: </label>
                        <input wire:model="name" type="text" class="rounded w-full">
                    </div>

                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Modalidad: </label>
                        <select class="w-full rounded" wire:model="modality_id">
                            @foreach ($modalities as $modality)
                                <option value="{{ $modality->id }}">{{ $modality->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('modality_id')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    @if ($modality_id == 2)
                        <div class="flex items-center mt-4">
                            <label class="w-32">URL: </label>
                            <input wire:model="url" type="text" class="rounded w-full">
                        </div>
                    @endif
                    @error('url')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Descripción: </label>
                        <textarea wire:model="description" class="rounded w-full"></textarea>
                    </div>

                    @error('description')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-2">
                    <button class="block p-2 rounded text-white font-bold bg-red-500"
                        @click="open = false">Cancelar</button>
                    <button class="block p-2 rounded text-white font-bold bg-green-500 ml-2"
                        wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
