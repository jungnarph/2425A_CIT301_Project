<x-guest-layout>
    <div class="mb-4 text-sm text-white">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-white d-flex justify-content-center align-items-center min-vh-100">
        <div class="p-5 rounded shadow-lg bg-gradient-to-r ">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-white" for="email">Email</label>
                    <x-text-input id="email" class="block mt-1 w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>

