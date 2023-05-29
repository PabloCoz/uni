<div>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
        <div class="my-5">
            <h1 class="font-bold text-2xl uppercase">talleres</h1>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            @foreach ($workshops as $course)
                <article class="bg-white overflow-hidden rounded-xl shadow-md">
                    <x-course-card :course="$course" />
                    <a href="{{ route('workshops.show', $course) }}">
                        <button class="bg-red-600 p-2 w-full text-white text-center font-bold">
                            Mas info...
                        </button>
                    </a>
                </article>
            @endforeach
        </div>
        <div class="mt-5">
            {{ $workshops->links() }}
        </div>
    </div>
</div>
