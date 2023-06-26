<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminEditProductComponent extends Component
{
    public $product_id;
    public $name;
    public $short_disc;
    public $disc;
    public $price;
    public $quantity;
    public $user_id;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name'=>'required',
            'short_disc'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric|min:1'
        ]);
    }

    public function updateProduct(){
        $this->validate([
            'name'=>'required',
            'short_disc'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric|min:1'
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->short_discription = $this->short_disc;
        $product->discription = $this->disc;
        $product->price = $this->price;
        $product->quantity = $this->quantity;
        $product->user_id = $this->user_id;
        $product->save();   
        session()->flash('message', 'Product has been updated succesfully!');
        redirect()->route('admin.dashboard');
    }

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->short_disc = $product->short_discription;
        $this->disc = $product->discription;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->user_id = $product->user_id;
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-product-component');
    }
}
