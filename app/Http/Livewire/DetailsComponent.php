<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $product_id;

    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('cart');
    }

    public function mount($id){
        $this->product_id = $id;
    }

    public function render()
    {
        $product = Product::where('id', $this->product_id)->first();
        $owner = User::find($product->user_id);
        return view('livewire.details-component', ['product'=>$product, 'owner'=>$owner]);
    }
}
