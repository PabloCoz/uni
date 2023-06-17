<x-admin-layout>

    <div class="block md:flex justify-between items-center mt-5">
        <h1 class="text-3xl font-bold">Panel Principal</h1>
        <h1 class="font-bold">Bienvenido: {{ Auth::user()->profile->name }} {{ Auth::user()->profile->lastname }}
        </h1>
    </div>

    <hr class="mt-2 mb-6 border border-gray-900">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <a href="{{ route('admin.courses.index') }}">
            <article class="bg-white overflow-hidden rounded-lg shadow-lg">
                <div class="p-8">
                    <h1 class="font-bold uppercase text-sm tracking-widest">Cursos</h1>
                    <section class="flex items-center justify-center">
                        <h1 class="text-6xl font-bold my-5 text-red-600">
                            {{ $courses }}
                        </h1>
                    </section>
                    <p class="block text-center font-bold text-red-600 tracking-wider">Publicados</p>
                </div>
            </article>
        </a>

        <a href="{{ route('admin.workshops.index') }}">
            <article class="bg-white overflow-hidden rounded-lg shadow-lg">
                <div class="p-8">
                    <h1 class="font-bold uppercase text-sm tracking-widest">Talleres</h1>
                    <section class="flex items-center justify-center">
                        <h1 class="text-6xl font-bold my-5 text-blue-600">
                            {{ $workshops }}
                        </h1>
                    </section>
                    <p class="block text-center font-bold text-blue-600 tracking-wider">Publicados</p>
                </div>
            </article>
        </a>

        <a href="{{ route('admin.trainings.index') }}">
            <article class="bg-white overflow-hidden rounded-lg shadow-lg">
                <div class="p-8">
                    <h1 class="font-bold uppercase text-sm tracking-widest">Capacitaciones</h1>
                    <section class="flex items-center justify-center">
                        <h1 class="text-6xl font-bold my-5 text-green-600">
                            {{ $trainings }}
                        </h1>
                    </section>
                    <p class="block text-center font-bold text-green-600 tracking-wider">Publicados</p>
                </div>
            </article>
        </a>

        <a href="{{ route('admin.events.index') }}">
            <article class="bg-white overflow-hidden rounded-lg shadow-lg">
                <div class="p-8">
                    <h1 class="font-bold uppercase text-sm tracking-widest">Proximos Eventos</h1>
                    <section class="flex items-center justify-center">
                        <h1 class="text-6xl font-bold my-5 text-violet-600">
                            {{ $coutEvents }}
                        </h1>
                    </section>
                    <p class="block text-center font-bold text-violet-600 tracking-wider">Publicados</p>
                </div>
            </article>
        </a>

        <article class="md:col-span-2">
            <div class="bg-white overflow-hidden rounded-lg shadow-lg">
                <section class="p-4 md:p-5">
                    <style>
                        .fc-now-indicator {
                            background-color: blue;
                        }
                    </style>
                    <div id='calendar'></div>
                    <script>
                        var event = @json($events);
                        document.addEventListener('DOMContentLoaded', function() {
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'dayGridMonth',
                                locale: 'es',
                                height: 375,
                                contentHeight: 600,
                                headerToolbar: {
                                    left: 'title',
                                    right: 'prev,next'
                                },
                                events: event,
                            });
                            calendar.render();
                        });
                    </script>
                </section>
            </div>
        </article>

        <article class="md:col-span-2">
            <div class="bg-white overflow-hidden rounded-lg shadow-lg">
                <div class="p-8">
                    <div class="flex justify-between items-center">
                        <h1 class="font-bold uppercase text-sm tracking-widest">Lista de postulantes</h1>
                        <a href="{{ route('admin.postulants') }}"
                            class="bg-gray-800 hover:bg-gray-900 text-white uppercase text-xs font-extrabold py-2 px-4 rounded">
                            Ver todos
                        </a>
                    </div>
                    <section class="flex items-center justify-center">
                        <div class="relative overflow-x-auto w-full mt-3">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nombres
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Correo
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($postulants as $postulant)
                                        <tr class="bg-white border-b ">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900">
                                                {{ $postulant->fullname }}
                                            </th>

                                            <td class="px-6 py-4">
                                                {{ $postulant->phone }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-6 py-4 text-center">
                                                No hay postulantes
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </section>
                </div>
            </div>
        </article>
    </div>

    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mt-5">
       <div class="col-span-1 md:col-span-2">
            <section class="bg-gray-200 overflow-hidden rounded-lg shadow-md">
                <article class="px-6 py-4">
                    <x-slider-component :sliders="$sliders" />
                </article>
            </section>
        </div>
    </div> --}}
</x-admin-layout>
