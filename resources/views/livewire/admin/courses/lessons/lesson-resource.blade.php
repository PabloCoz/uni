<div class="shadow-md overflow-hidden rounded-lg" x-data="{ open: false }">
    <div class="px-6 py-4 bg-gray-100">
        <header>
            <h1 @click="open = !open" class="cursor-pointer">Recursos:</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resources)

                @foreach ($lesson->resources as $resource)
                    <div class="flex justify-between items-center">
                        <p>
                            <i wire:click="download"
                                class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{ $resource->url }}
                        </p>
                        <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                    </div>
                @endforeach
            @endif
            <form wire:submit.prevent="save">
                <div class="flex items-center mt-3">
                    <input wire:model="files" type="file" class="form-input flex-1" multiple>
                    <button type="submit"
                        class="rounded-md bg-blue-600 text-white py-3 font-bold text-sm px-2 ml-2">Guardar</button>
                </div>
                <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="files">
                    Cargando...
                </div>
                @error('file')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </form>

        </div>
    </div>
</div>
