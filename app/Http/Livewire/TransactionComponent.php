<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\TransactionGroup;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TransactionComponent extends Component
{
    public $group_id;

    public function mount($id){
        $this->group_id = $id;
    }

    public function render()
    {
        $group = TransactionGroup::where('id', $this->group_id)->first();
        if (Auth::user()->id != $group->buyer_user_id) {
            session()->flash('message_error', 'You do not have permissions!');
            redirect()->route('index');
        }
        //$transactions = Transaction::where('group_id', $this->group_id);
        $transactions = Transaction::paginate();
        return view('livewire.transaction-component', ['transactions' => $transactions, 'group_id' => $this->group_id]);
    }
}
