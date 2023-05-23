<div>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
        <div class="my-5">
            <h1 class="font-bold text-2xl uppercase">talleres</h1>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($workshops as $course)
                <div>
                    <x-course-card :course="$course" />
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            {{$workshops->links()}}
        </div>
    </div>
</div>
