<x-admin-layout>
    <div class="max-w-6xl mx-auto lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">{{ $course->title }}</h1>
            @if ($course->status == 1)
                <form action="{{ route('admin.courses.approvedCourse', $course) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Publicar curso
                    </button>
                </form>
            @endif
        </div>

        <div class="mt-5" x-data="{
            openTab: 1,
            activeClasses: 'text-blue-600 bg-white rounded-t-lg',
            inactiveClasses: 'text-blue-500 hover:text-blue-800'
        }">

            <ul
                class="block md:flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <li class="mr-2" @click="openTab = 1">
                    <button :class="openTab === 1 ? activeClasses : inactiveClasses"
                        class="inline-block p-4 focus:outline-none">Módulos y Lecciones</button>
                </li>
                <li class="mr-2" @click="openTab = 2">
                    <button :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="inline-block p-4 focus:outline-none">Horarios</button>
                </li>
                <li class="mr-2" @click="openTab = 3">
                    <button :class="openTab === 3 ? activeClasses : inactiveClasses"
                        class="inline-block p-4 focus:outline-none">Metas del curso</button>
                </li>
                <li class="mr-2" @click="openTab = 4">
                    <button :class="openTab === 4 ? activeClasses : inactiveClasses"
                        class="inline-block p-4 focus:outline-none">Alumnos Registrados</button>
                </li>
            </ul>
            <div x-show="openTab === 1">
                @livewire('admin.courses.modules.module-index', ['course' => $course], key($course->id))
            </div>

            <div x-show="openTab === 2">
                @livewire('admin.courses.schedules.schedule-index', ['course' => $course], key($course->id))
            </div>

            <div x-show="openTab === 3">
                @livewire('admin.courses.goals.goal-index', ['course' => $course], key($course->id))
            </div>

            <div x-show="openTab === 4">
                @livewire('admin.courses.students.student-index', ['course' => $course], key($course->id))
            </div>
        </div>
    </div>
</x-admin-layout>
