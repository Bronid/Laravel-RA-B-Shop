<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionGroup;

class UserDashboardComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate();
        $transaction_groups = TransactionGroup::paginate();
        $transtactions = Transaction::paginate();
        return view('livewire.user.user-dashboard-component', ['products' => $products, 'transaction_groups' => $transaction_groups, 'transactions' => $transtactions]);
    }
}
