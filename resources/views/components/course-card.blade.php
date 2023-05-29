@props(['course'])


    <img class="h-60 w-full object-cover rounded-t-md" src="{{ Storage::url($course->image->url) }}" loading="lazy">
    <div class="p-4">
        <h1 class="font-semibold text-xl truncate">{{ Str::limit($course->title, 25, '') }}</h1>
        <hr class="mr-8 border border-gray-800 mt-2">
        <div class="mt-3">
            <section class="flex items-center">
                <i class="fa-regular fa-clock text-blue-600"></i>
                <p class="ml-1.5 font-bold text-gray-600 text-sm">{{ $course->hours }} horas</p>
            </section>
            <section class="flex items-center mt-1">
                <i class="fa-solid fa-graduation-cap"></i>
                <p class="ml-1.5 font-bold text-gray-600 text-sm">{{ $course->modality->name }}</p>
            </section>
            <section class="flex items-center mt-1">
                <i class="fa-solid fa-calendar-days"></i>
                <p class="ml-1.5 font-bold text-gray-600 text-sm">{{ Carbon\Carbon::parse($course->start_date)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($course->end_date)->format('d/m/Y') }}
                </p>
            </section>
        </div>
    </div>
    
