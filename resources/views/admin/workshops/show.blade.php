<x-admin-layout>
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold uppercase">{{ $workshop->title }}</h1>
        </div>

        <div class="mt-5" x-data="{
            openTab: 1,
            activeClasses: 'text-blue-600 bg-gray-100 rounded-t-lg',
            inactiveClasses: 'text-blue-500 hover:text-blue-800'
        }">

            <ul
                class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <li class="mr-2" @click="openTab = 1">
                    <button :class="openTab === 1 ? activeClasses : inactiveClasses"
                        class="inline-block p-4 focus:outline-none">Sesiones</button>
                </li>
                <li class="mr-2" @click="openTab = 2">
                    <button :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="inline-block p-4 focus:outline-none">Horarios</button>
                </li>
                <li class="mr-2" @click="openTab = 3">
                    <button :class="openTab === 3 ? activeClasses : inactiveClasses"
                        class="inline-block p-4 focus:outline-none">Objetivos del taller</button>
                </li>
                <li class="mr-2" @click="openTab = 4">
                    <button :class="openTab === 4 ? activeClasses : inactiveClasses"
                        class="inline-block p-4 focus:outline-none">Alumnos Registrados</button>
                </li>
            </ul>
            <div x-show="openTab === 1">
                @livewire('admin.workshops.sessions.session-index', ['workshop' => $workshop], key($workshop->id))
            </div>

            <div x-show="openTab === 2">
                @livewire('admin.workshops.schedules.schedule-index', ['workshop' => $workshop], key($workshop->id))
            </div>

            <div x-show="openTab === 3">
                @livewire('admin.workshops.goals.goal-index', ['workshop' => $workshop], key($workshop->id))
            </div>

            <div x-show="openTab === 4">
                {{-- @livewire('admin.workshops.students.student-index', ['workshop' => $workshop], key($workshop->id)) --}}
            </div>
        </div>
    </div>
</x-admin-layout>
