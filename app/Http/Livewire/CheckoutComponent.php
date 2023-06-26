<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionGroup;
use App\Models\User;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutComponent extends Component
{
    
    public function mount()
    {
        if (Auth::user()->balance - Cart::subtotal() >= 0) {
            $transaction_group = new TransactionGroup();
            $transaction_group->buyer_user_id = Auth::user()->id;
            $transaction_group->total = Cart::subtotal();
            $transaction_group->save();
            $user = User::find(Auth::user()->id);
            $user->balance = Auth::user()->balance - Cart::subtotal();
            $user->save();
            foreach (Cart::content() as $cart_product) {
                $ownerproduct = Product::where('id', $cart_product->id)->first();
                $owner = User::find($ownerproduct->user_id);
                $transaction = new Transaction();
                $transaction->group_id = $transaction_group->id;
                $transaction->seller_user_id = $owner->id;
                $transaction->product_name = $cart_product->name;
                $transaction->quantity = $cart_product->qty;  
                $transaction->price = $cart_product->price;
                $transaction->save();
            }  
            Cart::destroy();
            session()->flash('message', 'Products has been bought succesfully!');
            redirect()->route('user.dashboard');
        }
        else {
            session()->flash('message_error', 'You do not have enough money!');
            redirect()->route('cart');
        }
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
