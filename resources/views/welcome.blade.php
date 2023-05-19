<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-xl text-gray-800 leading-tight text-center">
            UNIVERSIDAD NACIONAL AUTÓNOMA DE CHOTA
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-5 lg:grid-cols-7 gap-y-4 md:gap-x-4">
                <div class="col-span-1 md:col-span-3 lg:col-span-5">
                    <x-slider-component :sliders="$sliders" />
                </div>

                <div class="col-span-2">
                    @include('auth.login')

                    <div class="mt-5">
                        <a href="{{ route('validate-pay') }}"
                            class="bg-red-600 text-white font-extrabold shadow-lg shadow-red-400 flex justify-center p-3 rounded-md uppercase tracking-wider text-sm">
                            Validación de pagos
                        </a>
                    </div>
                </div>
            </div>

            <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mx-2 md:mx-6 my-10">
                <article>
                    <h1 class="font-bold text-xl uppercase tracking-widest mb-6">Mision</h1>
                    <p class="text-justify">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also
                        the
                        leap into electronic typesetting, remaining essentially unchanged. It was popularised in the
                        1960s
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                        desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </article>
                <article>
                    <h1 class="font-bold text-xl uppercase tracking-widest mb-6">Vision</h1>
                    <p class="text-justify">
                        It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                        their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                        their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on
                        purpose (injected humour and the like).
                    </p>
                </article>
            </section>

        </div>

        <div class="py-12 bg-sky-900">
            <h1 class="text-center text-white font-bold text-2xl uppercase">
                Únete a la comunidad de emprendedores más grande del Perú
            </h1>
            <a href="{{ route('postulants.index') }}" class="flex justify-center mt-4">
                <button class="p-3 rounded-lg bg-red-500 text-white">
                    REGISTRATE
                </button>
            </a>
        </div>
    </div>
</x-app-layout>
