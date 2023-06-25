<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class UserDashboardComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate();
        return view('livewire.user.user-dashboard-component', ['products' => $products]);
    }
}
