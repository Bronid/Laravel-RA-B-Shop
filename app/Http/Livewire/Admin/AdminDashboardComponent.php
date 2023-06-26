<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\TransactionGroup;
use App\Models\User;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $products = Product::paginate();
        $users = User::paginate();
        $transaction_groups = TransactionGroup::paginate();
        return view('livewire.admin.admin-dashboard-component', ['products' => $products, 'users' => $users, 'transaction_groups' => $transaction_groups]);
    }
}
