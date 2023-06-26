<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminDeleteProductComponent extends Component
{
    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
        session()->flash('message', "Product has been deleted successfully!");
        redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('livewire.admin.admin-delete-product-component');
    }
}
