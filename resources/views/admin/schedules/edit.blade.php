<x-admin-layout>
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Editar Horario</h1>
            <div>
                <a href="{{ route('admin.schedules.index') }}"
                    class="bg-red-600 text-white p-2 rounded-md shadow font-bold">Lista de Horarios</a>
            </div>
        </div>
        <hr class="border border-black my-5">
        <div>
            <form action="{{ route('admin.schedules.update', $schedule) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="date" class="font-bold text-lg">Día:</label>
                    <select name="date" id="date" class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                        <option value="">-- Seleccione un día --</option>
                        <option value="Lunes" {{ $schedule->date == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                        <option value="Martes" {{ $schedule->date == 'Martes' ? 'selected' : '' }}>Martes</option>
                        <option value="Miercoles" {{ $schedule->date == 'Miercoles' ? 'selected' : '' }}>Miercoles
                        </option>
                        <option value="Jueves" {{ $schedule->date == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                        <option value="Viernes" {{ $schedule->date == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                        <option value="Sabado" {{ $schedule->date == 'Sabado' ? 'selected' : '' }}>Sabado</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="start" class="font-bold text-lg">Hora de inicio:</label>
                    <input type="time" name="start" id="start"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $schedule->start }}">
                    @error('start')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="end" class="font-bold text-lg">Hora de fin:</label>
                    <input type="time" name="end" id="end"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $schedule->end }}">
                    @error('end')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar
                        Horario</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
