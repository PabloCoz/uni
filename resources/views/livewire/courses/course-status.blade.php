<div>
    <div class="max-w-3xl mx-auto px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-semibold text-gray-900 mb-5 uppercase text-center">{{ $course->title }}</h1>

        @forelse ($course->modules as $module)

            <h1 class="font-bold text-lg text-gray-600 mb-2">{{ $module->name }}</h1>
            @foreach ($module->lessons as $lesson)
                <article class="mb-4 shadow mx-2 bg-white rounded-lg" x-data='{temario : false}'>
                    <header @click="temario = !temario"
                        class="flex items-center justify-between border border-white px-4 py-2 cursor-pointer">
                        <h1 class="font-bold text-lg text-gray-600">{{ $lesson->name }}</h1>
                        @if ($lesson->url)
                            <a href="{{ $lesson->url }}" target="_blank">
                                <i class="fa-solid fa-video text-xl"></i>
                            </a>
                        @endif
                    </header>
                    <hr class="my-2" :class="{ 'border border-slate-500 mx-3': temario }">
                    <div x-show="temario" class="py-2 px-4">
                        <div class="text-gray-600">
                            {!! $lesson->description !!}
                        </div>

                        @if (count($lesson->resources))
                            @livewire('courses.lesson-resources', ['lesson' => $lesson], key('lesson-resources' . $lesson->id))
                        @endif
                    </div>
                </article>
            @endforeach
            <hr class="my-6 border border-gray-800">
        @empty
            <article class="bg-white overflow-hidden shadow-md rounded-md">
                <div class="px-6 py-4">
                    Este curso no tiene ninguna lección
                </div>
            </article>
        @endforelse
    </div>
</div>
