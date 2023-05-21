<div>
    <div class="max-w-6xl mx-auto px-6 lg:px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
            @foreach ($courses as $course)
                <div>
                    <x-course-card :course="$course" />
                </div>
            @endforeach
        </div>
    </div>
</div>
