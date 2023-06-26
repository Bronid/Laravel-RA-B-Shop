<div class="container">
@if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
      <div class="col-md-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="bi bi-people-fill fs-2"></i>
              </div>
              <div>
                <h5 class="card-title">Registered Clients</h5>
                <p class="card-text">100</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="bi bi-cash-stack fs-2"></i>
              </div>
              <div>
                <h5 class="card-title">Total Sales</h5>
                <p class="card-text">$10,000</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="bi bi-person-badge-fill fs-2"></i>
              </div>
              <div>
                <h5 class="card-title">Registered Customers</h5>
                <p class="card-text">50</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <i class="bi bi-tag-fill fs-2"></i>
              </div>
              <div>
                <h5 class="card-title">Total Revenue</h5>
                <p class="card-text">$5,000</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Registered Users</h5>
            <ul class="list-group">

            @foreach($users as $user) 
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Name: {{ $user->name }} | Email: {{ $user->email }}  | Role: {{ $user->role }} | 
                Balance: {{ $user->balance }} zł | Created at: {{ $user->created_at }}
                <div>
                <a class="btn btn-danger btn-sm me-2" href="{{ route('admin.deleteuser.dashboard', ['user_id'=>$user->id]) }}">Delete</a>
                <a class="btn btn-gr btn-sm" href="{{ route('admin.edituser.dashboard', ['user_id'=>$user->id]) }}">Edit</a>
                </div>
              </li>
            @endforeach

            </ul>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product List</h5>
            <ul class="list-group">

            @foreach($products as $product) 
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Name: "{{ $product->name }}" |
                Price: {{ $product->price }} zł |
                Quantity: {{ $product->quantity }} |
                Owner id: {{ $product->user_id }} 
                <div>
                  <a class="btn btn-danger btn-sm me-2" href="{{ route('admin.deleteproduct.dashboard', ['product_id'=>$product->id]) }}">Delete</a>
                  <a class="btn btn-gr btn-sm" href="{{ route('admin.editproduct.dashboard', ['product_id'=>$product->id]) }}">Edit</a>
                </div>
              </li>
            @endforeach

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>