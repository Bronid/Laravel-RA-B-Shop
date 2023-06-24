<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $product_id;

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
