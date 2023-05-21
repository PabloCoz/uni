<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            Bienvenido
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
                <div class="col-span-1">
                    <a href="{{ route('courses.my-courses') }}">
                        <section class="bg-white overflow-hidden rounded-lg shadow-md">
                            <article class="px-6 py-4">
                                <div class="flex items-center justify-center">
                                    <i class="fa-solid fa-book text-3xl"></i>
                                    <h1 class="font-bold text-sm uppercase ml-4 tracking-widest">Mis cursos inscritos
                                    </h1>
                                </div>
                            </article>
                        </section>
                    </a>
                </div>
                <div class="col-span-1">
                    <section class="bg-white overflow-hidden rounded-lg shadow-md">
                        <article class="px-6 py-4">
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-chalkboard-user text-3xl"></i>
                                <h1 class="font-bold text-sm uppercase ml-4 tracking-widest">Mis capacitaciones
                                    inscritas
                                </h1>
                            </div>
                        </article>
                    </section>
                </div>
                <div class="col-span-1">
                    <section class="bg-white overflow-hidden rounded-lg shadow-md">
                        <article class="px-6 py-4">
                            <div class="flex items-center justify-center">
                                <i class="fa-solid fa-screwdriver-wrench text-3xl"></i>
                                <h1 class="font-bold text-sm uppercase ml-4 tracking-widest">Mis talleres inscritos</h1>
                            </div>
                        </article>
                    </section>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mt-3">
                <div class="lg:col-span-2">
                    <section class="bg-white overflow-hidden rounded-lg shadow-md">
                        <article class="px-6 py-4">
                            <x-slider-component :sliders="$sliders" />
                        </article>
                    </section>
                </div>
                <div class="col-span-1">
                    <section class="bg-white overflow-hidden rounded-lg shadow-md">
                        <article class="px-6 py-4">
                            <div id='calendar'></div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var calendarEl = document.getElementById('calendar');
                                    var calendar = new FullCalendar.Calendar(calendarEl, {
                                        initialView: 'dayGridMonth',
                                        locale: 'es',
                                        headerToolbar: {
                                            left: 'null',
                                            center: 'title',
                                            right: 'null'
                                        },
                                    });
                                    calendar.render();
                                });
                            </script>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
