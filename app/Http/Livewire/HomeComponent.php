<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class HomeComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(1000);
        return view('livewire.home-component', ['products' => $products]);
    }
}
