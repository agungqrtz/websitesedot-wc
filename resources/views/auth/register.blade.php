<x-guest-layout>
    <div class="min-h-screen flex">
        <div class="hidden lg:block w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1581578731548-c64695cc6952?q=80&w=2070&auto=format&fit=crop');">
            <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-white">Lancar Jaya WC</h2>
                    <p class="mt-2 text-lg text-gray-300">Solusi Sanitasi Profesional & Terpercaya</p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-100">
            <div class="w-full max-w-md">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Buat Akun Baru</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <x-input-label for="name" value="Nama Lengkap" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            Sudah punya akun?
                        </a>
                        <x-primary-button class="ms-4 bg-green-600 hover:bg-green-700">
                            Register
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>