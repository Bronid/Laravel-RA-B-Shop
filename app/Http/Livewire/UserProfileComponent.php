<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class UserProfileComponent extends Component
{
    public $user_id;

    public function mount($user_id){
        $this->user_id = $user_id;

    }

    public function render()
    {
        $products = Product::paginate();
        $user = User::where('id', $this->user_id)->first();
        if ($user == null) {
            session()->flash('message_error', 'User is not exist!');
            redirect()->route('index');
        }
        return view('livewire.user-profile-component', ['user' => $user, 'products' => $products]);
    }
}
