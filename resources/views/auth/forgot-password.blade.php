<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-container p-5 rounded shadow-lg bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
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

    <!-- Custom Styling -->
    <style>
        /* Center the form and apply a nice background */
        .login-container {
            max-width: 400px;
            width: 100%;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-container .form-control {
            border-radius: 0.375rem;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: white;
            color: #333;
        }

        .login-container .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 1px #4f46e5;
            background-color: #f9fafb;
        }

        /* Button customizations */
        .btn-primary {
            background-color: #6366f1;
            border-color: #4f46e5;
            border-radius: 0.375rem;
            padding: 12px;
            text-align: center;
            font-size: 16px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #4f46e5;
        }
    </style>
</x-guest-layout>

