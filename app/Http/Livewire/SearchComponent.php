<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class SearchComponent extends Component
{
    use WithPagination;

    public $q;
    public $search_string;

    public function mount(){
        $this->fill(request()->only('q'));
        $this->search_string = '%'.$this->q . '%';
    }

    public function render()
    {
        $products = Product::where('name', 'like', $this->search_string)->paginate(1000);
        return view('livewire.search-component', ['products' => $products]);
    }
}
