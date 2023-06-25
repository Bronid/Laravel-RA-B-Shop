<div class="container">
    
    <div class="row" style="background-color: #fff;">
      <div class="col-md-6">
        <div class="text-center p-4"> <img id="main-image" src="images/products/Mask.png" width="250" /> </div>
        <div class="thumbnail text-center mb-3"> <img onclick="change_image(this)" src="images/products/Mask.png" width="70"> <img onclick="change_image(this)" src="images/products/Rozetka.png" width="70"> </div>
      </div>
      <div class="col-md-6 text-center mt-4">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->discription }}</p>
        Price: <b class="product-price-1">{{ $product->price }}</b>
        <p>Stock: {{ $product->quantity }}</p>
        <p>Owner: {{ $owner->name }}</p>

  

        <a href="#" class="btn btn-gr mt-3 mb-3" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->price}})">Add to cart</a>
      </div>
    </div>

    <div class="mt-4">
      <h3 class="mb-4">Отзывы покупателей</h3>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Покупатель 1</h5>
          <p class="card-text">Отличный товар! Рекомендую.</p>
        </div>
      </div>
<div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Покупатель 2</h5>
          <p class="card-text">Не очень доволен товаром. Качество среднее.</p>
        </div>
      </div>
    </div>
    
</div>
