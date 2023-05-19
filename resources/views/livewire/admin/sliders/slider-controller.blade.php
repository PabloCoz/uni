<div>
    <div class="my-4">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-2xl">Gestion de anuncios</h1>
            <label for="{{ $rand }}" class="cursor-pointer">
                <i class="fa-solid fa-plus"></i>
                Añadir Imagen
            </label>

            <input wire:model="img" id="{{ $rand }}" type="file" class="hidden" accept="image/*, video/*" />
        </div>

    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        @if ($img)
            <article class="overflow-hidden bg-gray-100 rounded-lg shadow-md">
                <section class="px-6 py-4">
                    <div class="flex items-center justify-end my-1 space-x-2">
                        <i class="fa-solid fa-square-check text-green-600 text-lg cursor-pointer"
                            wire:click="create"></i>
                        <i class="fa-solid fa-square-xmark text-red-600 text-lg cursor-pointer" wire:click="cancel"></i>
                    </div>
                    <img class="w-full h-full object-cover" src="{{ $img->temporaryUrl() }}" loading="lazy"
                        alt="">
                </section>
            </article>
        @endif
        @foreach ($sliders as $slider)
            <article class="overflow-hidden bg-gray-100 rounded-lg shadow-md">
                <section class="px-6 py-4">
                    <div class="flex items-center justify-end mb-1">
                        <i class="fa-solid fa-trash-can cursor-pointer hover:text-red-600"
                            wire:click="delete({{ $slider->id }})"></i>
                    </div>

                    <img class="w-full rounded-lg" src="{{ Storage::url($slider->url) }}" loading="lazy" alt="">
                </section>
            </article>
        @endforeach
    </div>
</div>
