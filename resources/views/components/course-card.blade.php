@props(['course'])

<article class="bg-white overflow-hidden rounded-md flex flex-col">
    <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
    <div class="px-6 py-4 flex-1 flex flex-col">
        <h1 class="card-title">{{ Str::limit($course->title, 35) }}</h1>
        </p>
        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                </li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fa-solid fa-users"></i>
                ({{ $course->students_count }})
            </p>
        </div>
        <a href="{{ route('courses.show', $course) }}"
            class="bg-blue-500 p-2 w-full rounded text-white text-center font-bold">
            Mas Info...
        </a>
    </div>
</article>
