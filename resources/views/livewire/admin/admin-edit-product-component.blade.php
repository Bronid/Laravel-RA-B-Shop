<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Edit Product</h5>
            <form wire:submit.prevent="updateProduct()">

              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter product name" wire:model="name">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input class="form-control" id="price" placeholder="Enter product price" wire:model="price">
                @error('price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="short_disc" class="form-label">Short description</label>
                <textarea class="form-control" id="short_disc" rows="3" placeholder="Enter product short description" wire:model="short_disc"></textarea>
                @error('short_disc')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="disc" class="form-label">Description</label>
                <textarea class="form-control" id="disc" rows="3" placeholder="Enter product description" wire:model="disc"></textarea>
                @error('disc')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="quantity" placeholder="Enter product quantity" wire:model="quantity">
                @error('quantity')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="user_id" class="form-label">Owner id</label>
                <input type="text" class="form-control" id="user_id" placeholder="Enter owner id" wire:model="user_id">
                @error('user_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="photos" class="form-label">Photos</label>
                <input type="file" class="form-control" id="photos" multiple>
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
