<div>
    <div class="max-w-6xl mx-auto px-6 lg:px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
            @forelse ($workshops as $course)
                <article class="bg-white overflow-hidden rounded-xl shadow-md">
                    <x-course-card :course="$course" />
                    <a href="{{ route('workshops.status', $workshop) }}">
                        <button class="bg-red-600 p-2 w-full text-white text-center font-bold">
                            Continuar el curso
                        </button>
                    </a>
                </article>
            @empty
                <article class="bg-white overflow-hidden rounded-xl shadow-md">
                    <div class="px-6 py-4">
                        <h1 class="font-bold text-xl uppercase text-center">No hay talleres inscritos</h1>
                    </div>
                </article>
            @endforelse
        </div>
    </div>
</div>
