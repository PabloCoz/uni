<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slider-component :sliders="$sliders" />
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                <section class="bg-white overflow-hidden rounded-lg shadow-md">
                    <article class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <div>
                                <h1 class="uppercase text-sm font-bold tracking-widest my-3 text-center">
                                    Bienvenido
                                </h1>
                                <i class="fa-regular fa-user-circle text-7xl flex justify-center text-gray-600"></i>
                                <h1 class="mt-4 font-light text-center tracking-wider">
                                    {{ auth()->user()->profile->name }} {{ auth()->user()->profile->lastname }}
                                </h1>
                                <p class="text-center text-sm">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="bg-white overflow-hidden rounded-lg shadow-md">
                    <article class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <div>
                                <h1 class="text-6xl font-bold my-5 text-red-600 text-center">
                                    {{ $countCourse }}
                                </h1>
                                <h1 class="font-bold text-sm uppercase ml-4 tracking-widest">Mis cursos
                                </h1>
                            </div>
                        </div>
                    </article>
                    <a href="{{ route('courses.my-courses') }}">
                        <button class="w-full bg-red-500 p-4 text-white font-bold tracking-wider">
                            Inicia tu aprendizaje
                        </button>
                    </a>
                </section>

                <section class="bg-white overflow-hidden rounded-lg shadow-md">
                    <article class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <div>
                                <h1 class="text-6xl font-bold my-5 text-blue-600 text-center">
                                    {{ $countWorkshops }}
                                </h1>
                                <h1 class="font-bold text-sm uppercase ml-4 tracking-widest">Mis talleres
                                </h1>
                            </div>
                        </div>
                    </article>
                    <a href="{{ route('workshops.my-workshops') }}">
                        <button class="w-full bg-blue-500 p-4 text-white font-bold tracking-wider">
                            Inicia tu aprendizaje
                        </button>
                    </a>
                </section>

                <section class="bg-white overflow-hidden rounded-lg shadow-md">
                    <article class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <div>
                                <h1 class="text-6xl font-bold my-5 text-green-600 text-center">
                                    {{ $countTrainings }}
                                </h1>
                                <h1 class="font-bold text-sm uppercase ml-4 tracking-widest">Mis capacitaciones
                                </h1>
                            </div>
                        </div>
                    </article>
                    <a href="{{ route('trainings.my-trainings') }}">
                        <button class="w-full bg-green-600 p-4 text-white font-bold tracking-wider">
                            Inicia tu aprendizaje
                        </button>
                    </a>
                </section>

                <section class="bg-white overflow-hidden rounded-lg shadow-md md:col-span-2">
                    <article class="px-6 py-4">
                        <div id='calendar'></div>
                        <script>
                            var event = @json($events);
                            document.addEventListener('DOMContentLoaded', function() {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'dayGridMonth',
                                    locale: 'es',
                                    height: 450,
                                    contentHeight: 100,
                                    headerToolbar: {
                                        left: 'title',
                                        right: 'prev,next'
                                    },
                                    events: event,
                                });
                                calendar.render();
                            });
                        </script>
                    </article>
                </section>

                <section class="bg-white overflow-hidden rounded-lg shadow-md md:col-span-2">
                    <article class="px-6 py-4">
                        <h1 class="font-bold text-lg uppercase">Lista de proximos eventos</h1>

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Evento
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Fecha de inicio
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($listEvents as $item)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Apple MacBook Pro 17"
                                            </th>
                                            <td class="px-6 py-4">
                                                Silver
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                No hay eventos
                                            </th>
                                            <td class="px-6 py-4">
                                                -
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
