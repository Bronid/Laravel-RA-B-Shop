<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $short_disc;
    public $disc;
    public $price;
    public $quantity;
    public $photo;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name'=>'required',
            'short_disc'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric|min:1',
            'photo'=>'required'
        ]);
    }

    public function storeProduct(){
        $this->validate([
            'name'=>'required',
            'short_disc'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric|min:1',
            'photo'=>'required'
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->short_discription = $this->short_disc;
        $product->discription = $this->disc;
        $product->price = $this->price;
        $product->quantity = $this->quantity;
        $photoName = Carbon::now()->timestamp.'.'.$this->photo->extension();
        $this->photo->storeAs('products', $photoName);
        $product->photo = $photoName;
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
