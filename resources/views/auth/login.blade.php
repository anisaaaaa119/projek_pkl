<x-guest-layout>
    <div class="min-h-screen w-full flex items-center justify-center bg-white px-4">
        <div class="w-full max-w-2xl bg-white dark:bg-gray-800 shadow-2xl rounded-2xl p-12 space-y-8 border border-gray-200 dark:border-gray-700">

            <!-- Judul -->
            <div class="text-center">
                <h2 class="text-4xl font-extrabold text-green-700 dark:text-green-400">Masuk ke Akun</h2>
                <p class="mt-2 text-base text-gray-600 dark:text-gray-300">Selamat datang! Silakan login terlebih dahulu untuk melanjutkan.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6 text-base">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-green-700 dark:text-green-400" />
                    <x-text-input id="email" class="block mt-1 w-full border-green-300 focus:ring-green-500 focus:border-green-500"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-green-700 dark:text-green-400" />
                    <x-text-input id="password" class="block mt-1 w-full border-green-300 focus:ring-green-500 focus:border-green-500"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="rounded border-green-300 text-green-600 shadow-sm focus:ring-green-500"
                               name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat saya') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-green-600 hover:underline dark:text-green-400" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>

                <!-- Tombol Login -->
                <div class="pt-4">
                    <x-primary-button class="w-full justify-center bg-green-700 hover:bg-green-800 focus:ring-green-500 text-lg py-3">
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Link ke Daftar Akun -->
            <div class="text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-green-600 hover:underline dark:text-green-400 font-medium">
                        Daftar sekarang
                    </a>
                </p>
            </div>

        </div>
    </div>
</x-guest-layout>
