<x-guest-layout>
    <x-authentication-card>
        <div class="w-full sm:max-w-5xl mt-6 px-6 py-4  bg-[#001233] shadow-md overflow-hidden sm:rounded-lg">
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="text-[#e5e5e5]" />
                    <x-input id="name" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-[#e5e5e5]" />
                    <x-input id="email" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="id_rol" value="{{ __('Rol') }}" class="text-[#e5e5e5]" />
                    <select id="id_rol" name="id_rol" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5] border-[#4a5568] focus:border-[#4b8cdb] focus:ring-[#4b8cdb] rounded-md shadow-sm">
                        <option value="1">Administrador</option>
                        <option value="2">Vendedor</option>
                        <option value="3">Mecánico</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-[#e5e5e5]" />
                    <x-input id="password" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5]" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-[#e5e5e5]" />
                    <x-input id="password_confirmation" class="block mt-1 w-full bg-[#001233] text-[#e5e5e5]" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms" class="text-[#e5e5e5]">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2 text-[#e5e5e5]">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-[#4a5568] hover:text-[#e5e5e5]">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-[#4a5568] hover:text-[#e5e5e5]">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('dashboard') }}" class="bg-[#001233] hover:bg-[#002347] text-[#e5e5e5] font-bold py-2 px-4 rounded my-10">
                        Volver al Inicio</a>

                    <x-button class="ms-4 bg-[#001233]  text-[#e5e5e5]">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
