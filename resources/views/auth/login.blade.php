<x-guest-layout>
    <x-authentication-card>
        <div class="w-full sm:max-w-5xl mt-6 px-6 py-4 bg-[#ffffff] dark:bg-[#001233] shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-[#e5e5e5]" />
                    <x-input id="email" class="block mt-1 w-full bg-[#2d3748] text-[#e5e5e5] border-[#4a5568] focus:border-[#4b8cdb] focus:ring-[#4b8cdb]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-[#e5e5e5]" />
                    <x-input id="password" class="block mt-1 w-full bg-[#2d3748] text-[#e5e5e5] border-[#4a5568] focus:border-[#4b8cdb] focus:ring-[#4b8cdb]" type="password" name="password" required autocomplete="current-password" />
                </div>

                

                <div class="flex items-center justify-end mt-4">
                    

                    <x-button class="ms-4 bg-[#001233] hover:bg-[#002347] text-[#e5e5e5]">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
