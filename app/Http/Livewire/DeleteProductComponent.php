<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteProductComponent extends Component
{

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        if ($product->user_id == Auth::user()->id || Auth::user()->role == 'admin') {
            $product->delete();
            session()->flash('message', "Product has been deleted successfully!");
            redirect()->route('user.dashboard');
        }
        else {
            session()->flash('message_error', 'You do not have permissions for this product!');
            redirect()->route('user.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.delete-product-component');
    }
}
