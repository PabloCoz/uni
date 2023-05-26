<x-admin-layout>
    <div class="max-w-6xl mx-auto lg:px-8">
        <div class="block md:flex justify-between items-center">
            <h1 class="text-2xl font-bold">Panel Principal</h1>
            <h1 class="font-bold">Bienvenido: {{ Auth::user()->profile->name }} {{ Auth::user()->profile->lastname }}
            </h1>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mt-5">
        <div class="col-span-1">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
                <article class="px-6 py-4">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fa-solid fa-book text-3xl"></i>
                        <h1 class="text-xl font-bold">{{ $courses }} cursos publicados</h1>
                    </div>
                </article>
            </section>
        </div>
         <div class="col-span-1">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
                <article class="px-6 py-4">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fa-solid fa-chalkboard-user text-3xl"></i>
                        <h1 class="text-xl font-bold">{{ $trainings }} capacitaciones</h1>
                    </div>
                </article>
            </section>
        </div>
        <div class="col-span-1">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
                <article class="px-6 py-4">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fa-solid fa-screwdriver-wrench text-3xl"></i>
                        <h1 class="text-xl font-bold">{{ $workshops }} talleres</h1>
                    </div>
                </article>
            </section>
        </div>
        <div class="col-span-1">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
                <article class="px-6 py-4">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fa-solid fa-users-line text-3xl"></i>
                        <h1 class="text-xl font-bold">{{ $postulants }} postulantes</h1>
                    </div>
                </article>
            </section>
        </div>
        <div class="col-span-1">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
                <article class="px-6 py-4">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fa-solid fa-icons text-3xl"></i>
                        <h1 class="text-xl font-bold">{{ $postulants }} proximos eventos</h1>
                    </div>
                </article>
            </section>
        </div>
        <div class="col-span-1">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
                <article class="px-6 py-4">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fa-solid fa-icons text-3xl"></i>
                        <h1 class="text-xl font-bold">{{ $postulants }} proximos eventos</h1>
                    </div>
                </article>
            </section>
        </div>
        <div class="col-span-1">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
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
       <div class="col-span-1 md:col-span-2">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
                <article class="px-6 py-4">
                    <x-slider-component :sliders="$sliders" />
                </article>
            </section>
        </div>
    </div>
</x-admin-layout>
