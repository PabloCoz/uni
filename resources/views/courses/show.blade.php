<x-app-layout>
    <section class="bg-gray-900 mb-10">
        <div class="max-w-6xl mx-auto py-12 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-72 w-full object-cover rounded select-none" src="{{ Storage::url($course->image->url) }}"
                    alt="">
            </figure>


            <div class="text-white">
                <h1 class="text-3xl font-bold my-1">{{ $course->title }}</h1>
                <h1 class="text-lg mb-6">{{ $course->subtitle }}</h1>
                <p><i class="fas fa-users mr-2"></i>{{ $course->students_count }} estudiantes</p>
                <div class="flex items-center">
                    <ul class="flex text-sm">
                        <li class="mr-1"><i
                                class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i></li>
                        <li class="mr-1"><i
                                class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i></li>
                        <li class="mr-1"><i
                                class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i></li>
                        <li class="mr-1"><i
                                class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i></li>
                        <li class="mr-1"><i
                                class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i></li>
                    </ul>
                    <p class="ml-2">({{ $course->rating }})</p>
                </div>
                <a href="#">Prof. {{ $course->teacher->name . ' ' . $course->teacher->lastname }}</a>
                <div class="flex items-center mt-6">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <p class="mx-1">{{ $course->modality->name }}</p>
                </div>
                <div class="mt-3">
                    <i class="fa-solid fa-clock"></i>
                    Horarios
                    @foreach ($course->schedules as $schedule)
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
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i
                                    class="fas fa-check text-gray-600 mr-2"></i>{{ $goal->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold txt-3xl mb-2">Temario:</h1>

                @foreach ($course->modules as $module)
                    <article class="mb-4 shadow"
                        @if ($loop->first) x-data ='{temario : true}'
                        @else
                            x-data ='{temario : false}' @endif>
                        <header @click="temario = !temario"
                            class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200">
                            <h1 class="font-bold text-lg text-gray-600">{{ $module->name }}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show='temario'>
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($module->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i
                                            class="far fa-play-circle mr-2 text-green-400"></i>{{ $lesson->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl">Descripcion:</h1>

                <div class="text-base text-gray-700">
                    {!! $course->description !!}
                </div>

            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="overfllow-hidden bg-white shadow rounded-lg mb-4">
                <div class="px-6 py-4">
                    @can('enrolled', $course)
                        <a href="{{ route('courses.status', $course) }}"
                            class="bg-red-600 p-2 w-full text-white font-bold text-center rounded block mt-4">Continuar con
                            el curso</a>
                    @else
                        <form action="{{ route('courses.enrolled', $course) }}" method="POST">
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
