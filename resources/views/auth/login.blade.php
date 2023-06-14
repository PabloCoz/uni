<x-app-layout>
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-48" src="{{ asset('img/incuba.png') }}" alt="logo">

            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Iniciar Sesión
                    </h1>
                    <form action="{{ route('login') }}" method="POST" class="space-y-4 md:space-y-6">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">
                                Usuario</label>
                            <input type="text" id="username" name="username" autocomplete="username"
                                :value="old('username')"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                            <input type="password" name="password" id="password" autocomplete="current-password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5"
                                required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-between">
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-medium text-sky-600 hover:underline">¿Olvidaste tu
                                contraseña?</a>
                        </div>
                        <button type="submit"
                            class="w-full font-bold text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 rounded-lg text-sm px-5 py-2.5 text-center uppercase tracking-widest">
                            Ingresar
                        </button>
                    </form>
                    <a href="{{ route('validate-pay') }}"
                        class="w-full block font-bold text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm px-5 py-2.5 text-center uppercase tracking-widest">
                        Validación de código
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
