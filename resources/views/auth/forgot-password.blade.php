<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Elfelejtette jelszavát? Semmi gond. Csak adja meg e-mail címét, és küldünk Önnek egy jelszó-visszaállító linket, amellyel új jelszót választhat..') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('E-mail jelszó-visszaállítási hivatkozás') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
