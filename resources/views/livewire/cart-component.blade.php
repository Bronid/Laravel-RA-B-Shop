<div class="container">
    <h1>Cart</h1>

    @if(Session::has('message'))
    <div class='alert alert-success'>
      <strong>Success | {{Session::get('success_message')}}</strong>
    </div>
    @endif

    @if(Session::has('message_error'))
    <div class='alert alert-danger'>
      <strong>Error | {{Session::get('message_error')}}</strong>
    </div>
    @endif
    
    <div class="row">
      <div class="col-md-8">

      @if(Cart::count() > 0)
      @foreach(Cart::content() as $item)

        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../images/products/{{App\Models\Product::where('id', $item->id)->first()->photo}}" class="img-fluid" alt="image"
              style="width: 300px; height:200px;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$item->model->name}}</h5>
                Price:<b class="product-price-1 me-2"> {{$item->model->price}} zł</b>
                <div class="quantity-button">
                <div class="btn" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">-</div>
                <a> {{$item->qty}} </a>
                <div class="btn" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</div>
                </div>
                <br><button class="btn btn-danger" wire:click.prevent="destroy('{{ $item->rowId }}')">Delete</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      @else
      <p>Nothing</p>
      @endif
      </div>
      
      <div class="col-md-4">
        <h2>Summary</h2>
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Number of products: {{Cart::count()}}</h5>
            <h5 class="card-title">Summary: {{Cart::subtotal()}} zł</h5><h5 class="product-price-2 mb-3">
            <a href="{{ route('checkout') }}" class="btn btn-gr">Buy</a>
          </div>
        </div>
        
      </div>
    </div>
    
  </div>