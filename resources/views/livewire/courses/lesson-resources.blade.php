<div>
    <div class="bg-gray-100 rounded-md overflow-hidden">
        <section class="px-4 py-2">
            <h1 class="italic text-sm font-bold">Material de clase</h1>

            @foreach ($lesson->resources as $key => $item)
                <article class="flex items-center text-gray-700 text-sm mt-2">
                    <i class="fa-solid fa-file-arrow-down text-2xl cursor-pointer mr-2" wire:click="download({{$item->id}})"></i>
                    Descarga {{ $key + 1 }}
                </article>
            @endforeach
        </section>
    </div>
</div>
