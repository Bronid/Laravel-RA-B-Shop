<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProductComponent extends Component
{
    public $product_id;
    public $name;
    public $short_disc;
    public $disc;
    public $price;
    public $quantity;

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
        $product->user_id = Auth::user()->id;
        $product->save();   
        session()->flash('message', 'Product has been updated succesfully!');
        redirect()->route('user.dashboard');
    }

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        if ($product->user_id == Auth::user()->id || Auth::user()->role == 'admin') {
            $this->product_id = $product->id;
            $this->name = $product->name;
            $this->short_disc = $product->short_discription;
            $this->disc = $product->discription;
            $this->price = $product->price;
            $this->quantity = $product->quantity;
        }
        else {
            session()->flash('message_error', 'You do not have permissions for this product!');
            redirect()->route('user.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.edit-product-component');
    }
}
