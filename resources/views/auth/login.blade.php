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
              <label for="email" class="form-label" :value="__('Email')">Email</label>
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>

              <div class="mb-3">
              <label for="password" class="form-label" :value="__('Password')">Password</label>
              <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>

              <p class="mb-3"><a href="{{ route('register') }}">Create account</a></p>

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
