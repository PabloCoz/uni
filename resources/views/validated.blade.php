<x-app-layout>
    <div>
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-black rounded-lg bg-blue-200"
                role="alert">
                <span class="font-bold">{{ session('success') }}</span>
                Se enviara su usuario y contraseña al correo que registro.
            </div>
        @elseif(session('error'))
            <div class="p-4 mb-4 text-sm text-black rounded-lg bg-red-200"
                role="alert">
                <span class="font-bold">{{ session('error') }}</span>
        @endif

        @livewire('validated-pay')
    </div>
</x-app-layout>
