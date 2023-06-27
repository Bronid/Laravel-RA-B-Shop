<div class="container-fluid mt-5">
@if(Session::has('message_error'))
        <div class="alert alert-danger" role="alert">{{ Session::get('message_error') }}</div>
    @endif
      <div class="row g-2">

      @foreach($products as $product)

        <div class="col-3">
          <div class="p-3">
            <div class="card">
              <img src="images/products/{{$product->photo}}" class="card-img-top mt-2" alt="..." style="width: 350px; height:220px;">
              <div class="card-body">
                <h5 class="product-title text-center">{{ $product->name }}</h5>
                <div class="row align-items-center mt-3">
                  <div class="col">
                    <div class="p-2 text-start">
                      <p class="card-text product-price-2">{{ $product->price }}zł</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="p-2 text-end">
                      <a href="{{route('product.details', ['id'=>$product->id])}}" tabindex="-1"
                      class="btn-sm btn-cart text-white"><img class="nav-ico-1" src="images/icons/cart.png"></a>
                    </div>
                  </div>
                </div>
                <p class='text-center'>{{ $product->short_discription }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach

  </div>
