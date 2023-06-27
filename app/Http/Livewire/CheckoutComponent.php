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
        $subtotal = (double)filter_var(Cart::subtotal(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        var_dump($subtotal);
        if ((float)Auth::user()->balance - $subtotal >= 0) {

            foreach (Cart::content() as $cart_product) {
                $ownerproduct = Product::where('id', $cart_product->id)->first();
                if ($ownerproduct->quantity - $cart_product->qty < 0) {
                    session()->flash('message_error', 'Seller do not have enough items to sell!');
                    redirect()->route('cart');
                    return;
                }
            }

            $transaction_group = new TransactionGroup();
            $transaction_group->buyer_user_id = Auth::user()->id;
            $transaction_group->total = $subtotal;
            $transaction_group->save();
            $user = User::find(Auth::user()->id);
            $user->balance = $user->balance - $subtotal;
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

                $owner->balance = $owner->balance + $cart_product->price * $cart_product->qty;
                $owner->save();
                
                $ownerproduct->quantity = $ownerproduct->quantity - $cart_product->qty;
                $ownerproduct->save();
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
