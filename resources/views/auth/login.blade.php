<x-app-layout>
<div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Login</h5>
            <form method="POST" action="{{ route('login') }}">

            @csrf

              <div class="mb-3">
              <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>

              <div class="mb-3">
              <x-input-label for="password" :value="__('Password')" />
              <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>

              <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>

              <div class="d-grid">
                <button type="submit" class="btn btn-gr">Login</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
