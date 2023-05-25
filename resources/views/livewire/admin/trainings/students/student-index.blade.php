<div class="mt-5">
    <h2 class="font-semibold text-lg mb-5">Lista de estudiantes</h2>
    <div class="mx-3">
        @foreach ($students as $student)
            <div class="flex items-center justify-between mb-3">


                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">
                        {{ $student->profile->name }} {{ $student->profile->lastname }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $student->email }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
