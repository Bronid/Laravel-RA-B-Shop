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
              <li class="list-group-item d-flex justify-content-between">
                <span>Balance:</span>
                <span>{{ $user->balance }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>