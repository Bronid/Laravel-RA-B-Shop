<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $user->name }} Information</h5>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between">
                <span>Name:</span>
                <span>{{ $user->name }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Email:</span>
                <span>{{ $user->email }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Role:</span>
                <span>{{ $user->role }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $user->name }} Product list</h5>
            <ul class="list-group">

            @foreach($products as $product)
            @if($product->user_id == $user->id)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Name: "{{ $product->name }}" |
                Price: {{ $product->price }} zł |
                Quantity: {{ $product->quantity }}
                <a class="btn-primary btn-sm justify-content-center" href="{{ route('product.details', ['id' => $product->id]) }}">Link</a>
              </li>
            @endif
            @endforeach  
            </ul>
          </div>
        </div>
      </div>

    </div>
</div>