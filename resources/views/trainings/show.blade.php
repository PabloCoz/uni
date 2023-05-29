<x-app-layout>
    <section class="bg-gray-900 mb-10">
        <div class="max-w-6xl mx-auto py-12 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-72 w-full object-cover rounded-lg select-none"
                    src="{{ Storage::url($training->image->url) }}" loading="lazy">
            </figure>


            <div class="text-white mx-2 lg:mx-0">
                <h1 class="text-3xl font-bold my-1">{{ $training->title }}</h1>
                <hr class="mt-2 mb-3">
                <div class="text-base text-justify">
                    {!! $training->description !!}
                </div>
                <p class="mt-3"><i class="fas fa-users mr-2"></i>{{ $training->students_count }}</p>

                <div class="flex items-center mt-3">
                    <i class="fa-regular fa-calendar-days"></i>
                    <p class="mx-1">{{ Carbon\Carbon::parse($training->start_date)->format('d/m/Y') }} -
                        {{ Carbon\Carbon::parse($training->end_date)->format('d/m/Y') }}</p>
                </div>

                <div class="flex items-center mt-3">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <p class="mx-1">{{ $training->modality->name }}</p>
                </div>
                <div class="mt-3">
                    <i class="fa-solid fa-clock"></i>
                    Horarios
                    @foreach ($training->schedules as $schedule)
                        <p class="ml-4 font-semibold">{{ $schedule->date }} {{ $schedule->start }} -
                            {{ $schedule->end }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="overfllow-hidden shadow rounded-lg bg-white mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas:</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($training->goals as $goal)
                            <li class="text-gray-700 text-base"><i
                                    class="fas fa-check text-gray-600 mr-2"></i>{{ $goal->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold txt-3xl mb-2">Temario:</h1>

                @foreach ($training->themes as $theme)
                    <article class="mb-4 shadow"
                        @if ($loop->first) x-data ='{temario : true}'
                        @else
                            x-data ='{temario : false}' @endif>
                        <header @click="temario = !temario"
                            class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200">
                            <h1 class="font-bold text-lg text-gray-600">{{ $theme->name }}</h1>
                        </header>
                    </article>
                @endforeach
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="overfllow-hidden bg-white shadow rounded-lg mb-4">
                <div class="px-6 py-4">
                    @can('enrolled', $training)
                        <a href="{{ route('trainings.status', $training) }}"
                            class="bg-red-600 p-2 w-full text-white font-bold text-center rounded block mt-4">Continuar con
                            la capacitación</a>
                    @else
                        <form action="{{ route('trainings.enrolled', $training) }}" method="POST">
                            @csrf
                            <button class="bg-red-600 p-2 w-full text-white font-bold text-center rounded block mt-3"
                                type="submit">Inscribirse</button>
                        </form>
                    @endcan
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
