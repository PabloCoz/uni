<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
        <img class="w-48" src="{{ asset('img/incuba.png') }}" alt="logo">

    </a>
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-xl xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

            <h1 class="font-bold text-center text-xl uppercase">Validación de pagos</h1>
            <div class="mt-4">
                <form wire:submit.prevent="store">
                    <div class="mt-4">
                        <label for="code" class="font-bold">Codigo de validacion</label>
                        <input type="text" wire:model="code" class="w-full border border-gray-500 rounded-md p-2">
                        @error('code')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="file" class="font-bold">Imagen de voucher</label>
                        <input type="file" wire:model="img" class="w-full border border-gray-500 rounded-md p-2"
                            accept="image/*">
                        @error('img')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('remember-code') }}" class="underline">Olvide mi codigo</a>
                        </div>
                        <div class="space-x-3">
                            <a href="{{ route('login') }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">
                                Cancelar
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                                Validar
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
