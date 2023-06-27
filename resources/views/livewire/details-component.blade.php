<div class="container">
    
    <div class="row" style="background-color: #fff;">
      <div class="col-md-6">
        <div class="text-center p-4"> <img id="main-image" src="../images/products/{{$product->photo}}" width="250" /> </div>
      </div>
      <div class="col-md-6 text-center mt-4">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->discription }}</p>
        Price: <b class="product-price-1">{{ $product->price }} zł</b>
        <p>Stock: {{ $product->quantity }}</p>
        <p>Owner: </p><a class=" d-flex justify-content-center" href="{{ route('user.profile', ['user_id' => $product->user_id]) }}">{{ $owner->name }}</a>

        <a href="#" class="btn btn-gr mt-3 mb-3" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->price}})">Add to cart</a>
      </div>
    </div>
    </div>
    
</div>
