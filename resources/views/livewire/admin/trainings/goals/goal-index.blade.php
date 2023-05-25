<div class="mt-5">
    <h2 class="font-semibold text-lg mb-5">Metas del curso</h2>
    @foreach ($training->goals as $item)
        <article class="overflow-hidden rounded-lg shadow mb-4">
            <div class="px-6 py-4 bg-gray-100">
                @if ($goal->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="goal.name" type="text" class="form-input w-full">

                        @error('goal.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between">
                        <h1>{{ $item->name }}</h1>
                        <div>
                            <i wire:click="edit({{ $item }})"
                                class="fas fa-edit text-blue-500 cursor-pointer"></i>
                            <i wire:click="destroy({{ $item }})"
                                class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="overflow-hidden rounded-lg shadow">
        <div class="px-6 py-4 bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="name" type="text" class="rounded w-full"
                    placeholder="Agregar una meta...">

                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                <div class="flex justify-end mt-2">
                    <button type="submit" class="block rounded text-white font-semibold p-2 bg-blue-500">Agregar
                        Meta</button>
                </div>
            </form>
        </div>
    </article>
</div>
