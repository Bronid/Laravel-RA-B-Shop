<div class="container">
    <h1>Order</h1>
    
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Delivery Information</h5>
        <div class="mb-3">
          <label for="nameInput" class="form-label">Name</label>
          <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <label for="addressInput" class="form-label">Address</label>
          <input type="text" class="form-control" id="addressInput" placeholder="Enter your address">
        </div>
        <div class="mb-3">
          <label for="phoneInput" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="phoneInput" placeholder="Enter your phone number">
        </div>
      </div>
    </div>
    
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Payment Method</h5>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentMethod" id="creditCardRadio" checked>
          <label class="form-check-label" for="creditCardRadio">
            Credit Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentMethod" id="paypalRadio">
          <label class="form-check-label" for="paypalRadio">
            PayPal
          </label>
        </div>
        <button type="submit" class="btn btn-gr mt-3">Place Order</button>
      </div>
    </div>
  </div>