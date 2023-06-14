<x-guest-layout>
    <style>
        .containers {
            max-width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-600 {
            color: #4a5568;
        }

        .block {
            display: block;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .w-full {
            width: 100%;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .primary-button {
            background-color: #4c51bf;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .primary-button:hover {
            background-color: #434190;
        }

        @media (max-width: 640px) {
            .container {
                padding: 10px;
            }
        }
    </style>

    <div class="containers">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <div class="mb-4">
            @if (session('status'))
                {{ session('status') }}
            @endif
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block">{{ __('Email') }}</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
                @if ($errors->has('email'))
                    <div class="mt-2">
                        @foreach ($errors->get('email') as $error)
                            <span class="text-sm text-red-600">{{ $error }}</span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="primary-button">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
