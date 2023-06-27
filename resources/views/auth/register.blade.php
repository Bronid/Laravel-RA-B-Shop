<x-app-layout>
        <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="container mt-4">
        <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Enter your email and password</h5>
        <div class="mb-3">
            <label for="name" class="form-label" :value="__('Name')">Name</label>
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="form-label" :value="__('Email')">Email</label>
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="form-label" :value="__('Password')">Password</label>
            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="form-label" :value="__('Confirm Password')">Confirm Password</label>

            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mb-3 mt-4">
          <select class="form-select" id="role" :value="__('Role')" type="role" name="role" :value="old('role')">
            <option selected disabled>Select role</option>
            <option value="user">user</option>
            <option value="seller">seller</option>
          </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <br>
            <x-primary-button class="btn btn-gr mt-3">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
