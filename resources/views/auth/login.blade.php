<x-guest-layout>
  <style>
    form {
  display: flex;
  flex-direction: column;
  gap: 20px;
  background-color: rgba(0, 0, 0, .03);
  padding: 20px;
  border-radius: 12px;
}

form input{
  width: 100%;
  border: 1px solid black;
  padding: 10px;
}

form input:focus {
  border-radius: 12px;
}

form label {
  margin-bottom: -14px;
  font-size: 16px;
  font-weight: 550;
}

.rounded {
  border-radius: 12px;
}

.tombol {
  padding: 10px;
  border-radius: 12px;
  display: block;
  margin: 0 auto;
  font-weight: 700;
}

a {
  text-decoration: none;
}
  </style>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        
            <label>Email</label>
            <input id="email" class="rounded" type="email" name="email" required/>
            
            <label>Password</label>

            <input id="password" class="rounded"
                            type="password"
                            name="password"
                            required />

            

        

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="tombol">
Log in
            </button>
        </div>
    </form>
</x-guest-layout>
