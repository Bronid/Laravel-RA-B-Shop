<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddProductComponent extends Component
{
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

    public function storeProduct(){
        $this->validate([
            'name'=>'required',
            'short_disc'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric|min:1'
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->short_discription = $this->short_disc;
        $product->discription = $this->disc;
        $product->price = $this->price;
        $product->quantity = $this->quantity;
        $product->user_id = Auth::user()->id;
        $product->save();   
        session()->flash('message', 'Product has been created succesfully!');
        redirect()->route('user.dashboard');
    }

    public function render()
    {
        return view('livewire.add-product-component');
    }
}
