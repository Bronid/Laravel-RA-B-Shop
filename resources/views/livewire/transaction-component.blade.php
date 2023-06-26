<div class="container">
    <div class="row">
      <div class="col-md-11">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Transaction info</h5>
            <ul class="list-group">

            @foreach($transactions as $transaction)
            @if($transaction->group_id == $group_id)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Name: "{{ $transaction->product_name }}" |
                Quantity: {{ $transaction->quantity }}
                Total: {{ $transaction->price * $transaction->quantity }} zł |
                Data: {{ $transaction->created_at }}
            </li>
            @endif
            @endforeach

            </ul>
          </div>
        </div>
      </div>

    </div>
</div>