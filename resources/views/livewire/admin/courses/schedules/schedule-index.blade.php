<div class="mt-5">
    <div class="flex items-center justify-between mb-4">
        <h1 class="font-bold text-lg">Horarios</h1>
        @if (count($course->schedules))
            <button wire:click="clearSchedule" class="text-white text-sm font-bold p-2 rounded-lg shadow bg-blue-600">
                Cambiar horarios
            </button>
        @endif
    </div>

    <div>
        @forelse ( $course->schedules as  $item)
            <article class="overflow-hidden rounded-lg bg-gray-100 mb-4">
                <div class="px-6 py-4">
                    <div>
                        <ul class="space-y-2">
                            <li>
                                <p class="font-bold">{{ $item->date }}</p>
                                {{ $item->start }} - {{ $item->end }}
                            </li>
                        </ul>
                    </div>

                </div>
            </article>
        @empty
            <div>
                <p class="text-sm">No hay horarios asignados</p>
                <div class="mb-6">

                    <article class="overflow-hidden rounded-lg bg-gray-100 mb-4">
                        <div class="px-6 py-4">
                            <header class="">
                                <h1 class="font-bold">Lista de horarios</h1>
                            </header>
                            <div>
                                @foreach ($schedules as $schedule)
                                    <ul class="space-y-2">
                                        <li>
                                            <input type="checkbox" class="rounded" value="{{ $schedule->id }}"
                                                wire:model="selected.{{ $schedule->id }}">
                                            {{ $schedule->date }}
                                            {{ $schedule->start }} - {{ $schedule->end }}
                                        </li>
                                    </ul>
                                @endforeach
                                <div class="mt-5 flex item justify-end">
                                    <x-danger-button wire:click="store">Asignar horarios</x-danger-button>
                                </div>
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        @endforelse
    </div>
</div>
