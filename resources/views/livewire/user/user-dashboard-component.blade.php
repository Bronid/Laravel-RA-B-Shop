<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">User Information</h5>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between">
                <span>Name:</span>
                <span>{{ Auth::user()->name }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Email:</span>
                <span>{{ Auth::user()->email }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Role:</span>
                <span>{{ Auth::user()->role }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Balance:</span>
                <span>{{ Auth::user()->balance }}</span>
              </li>
              <li class="list-group-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms" checked disabled>
                  <label class="form-check-label" for="terms">
                    Agree to terms and conditions
                  </label>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      @if(Auth::user()->role == "user")
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Transaction list</h5>
            <ul class="list-group">
      @foreach($transaction_groups as $transaction_group)
      @if($transaction_group->buyer_user_id == Auth::user()->id)
      <li class="list-group-item d-flex justify-content-between align-items-center">
                Date: "{{ $transaction_group->created_at }}" |
                Total: {{ $transaction_group->total }} zł |
                <div>
                  <a class="btn btn-gr btn-sm" href="{{ route('transaction', ['id'=>$transaction_group->id]) }}">More info</a>
                </div>
              </li>
        @endif
        @endforeach  
        @endif


      @if(Auth::user()->role == 'seller')
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product list</h5>
            <ul class="list-group">

            @foreach($products as $product)
            @if($product->user_id == Auth::user()->id)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Name: "{{ $product->name }}" |
                Price: {{ $product->price }} zł |
                Quantity: {{ $product->quantity }}
                <div>
                  <a class="btn btn-danger btn-sm me-2" href="{{ route('deleteproduct.dashboard', ['product_id'=>$product->id]) }}">Delete</a>
                  <a class="btn btn-gr btn-sm" href="{{ route('editproduct.dashboard', ['product_id'=>$product->id]) }}">Edit</a>
                </div>
              </li>
            @endif
            @endforeach  
            <a class="btn-primary d-flex justify-content-center" href="{{ route('addproduct.dashboard') }}">Add new product</a>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Transaction list</h5>
            <ul class="list-group">
            @foreach($transactions as $transaction)
            @if($transaction->seller_user_id == Auth::user()->id)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Name: "{{ $transaction->product_name }}" |
                Quantity: {{ $transaction->quantity }}
                Total: {{ $transaction->price * $transaction->quantity }} zł |
                Data: {{ $transaction->created_at }}
            </li>
            @endif
            @endforeach

      @endif
    </div>
</div>