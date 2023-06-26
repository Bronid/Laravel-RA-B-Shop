<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Edit User</h5>
            <form wire:submit.prevent="updateProduct()">

              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model="name">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" wire:model="email">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" placeholder="Enter role" wire:model="role">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="balance" class="form-label">Balance</label>
                <input class="form-control" id="balance" placeholder="Enter balance" wire:model="balance">
                @error('price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-gr">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>