<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-xl text-gray-800 leading-tight text-center">
            UNIVERSIDAD NACIONAL AUTÓNOMA DE CHOTA
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 mt-12">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-black rounded-lg bg-blue-200" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
                El codigo expira en 3 días.
            </div>
        @elseif(session('error'))
            <div class="p-4 mb-4 text-sm text-black rounded-lg bg-red-200" role="alert">
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <h1 class="text-center text-2xl font-bold mb-4">INCUBA UNACH</h1>
            <h2 class="text-center text-xl font-bold">DESPEGA CON UNACH - PRIMER CONCURSO NACIONAL DE
                EMPRENDIMIENTO
                E INNOVACIÓN</h2>
            <div class="flex justify-center">
                <img src="" alt="LOGO" class="">
            </div>
            <hr class="border border-gray-500 mt-4">
            <div class="max-w-2xl mx-auto mt-10">
                <h1 class="text-center font-bold">REGISTRATE Y ÚNETE</h1>
                <form action="{{ route('postulants.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mt-4">
                        <label for="">Nombres y Apellidos</label>
                        <input type="text" name="fullname" class="w-full border border-gray-500 rounded-md p-2"
                            required>
                    </div>
                    <div class="mt-4">
                        <label for="">Correo Electrónico</label>
                        <input type="email" name="email" class="w-full border border-gray-500 rounded-md p-2"
                            required>
                    </div>
                    <div class="mt-4">
                        <label for="">Celular</label>
                        <input type="number" name="phone" class="w-full border border-gray-500 rounded-md p-2"
                            required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label for="">País</label>
                            <input type="text" name="country" class="w-full border border-gray-500 rounded-md p-2"
                                required>
                        </div>
                        <div>
                            <label for="">Ciudad</label>
                            <input type="text" name="city" class="w-full border border-gray-500 rounded-md p-2"
                                required>
                        </div>
                        <div>
                            <label for="">Distrito</label>
                            <input type="text" name="district" class="w-full border border-gray-500 rounded-md p-2"
                                required>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="">Descripcion</label>
                        <textarea name="description" id="" class="w-full border border-gray-500 rounded-md p-2" required></textarea>
                    </div>
                    <div class="mt-4 flex justify-end items-center">
                        <button class="bg-blue-500 text-white px-4 py-2 font-bold rounded-md">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
