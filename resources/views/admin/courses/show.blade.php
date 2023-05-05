<x-admin-layout>
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">{{ $course->title }}</h1>
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
                        class="inline-block p-4">Modulos</button>
                </li>
                <li class="mr-2" @click="openTab = 2">
                    <button :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="inline-block p-4">Lecciones</button>
                </li>
                <li class="mr-2" @click="openTab = 3">
                    <button :class="openTab === 3 ? activeClasses : inactiveClasses"
                        class="inline-block p-4">Settings</button>
                </li>
                <li class="mr-2" @click="openTab = 4">
                    <button :class="openTab === 4 ? activeClasses : inactiveClasses"
                        class="inline-block p-4">Contacts</button>
                </li>
            </ul>
            <div x-show="openTab === 1">
                <p>Contenido de la pestaña 1...</p>
            </div>

            <div x-show="openTab === 2">
                <p>Contenido de la pestaña 2...</p>
            </div>
        </div>
    </div>
</x-admin-layout>
