<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminDeleteUserComponent extends Component
{
    public function mount($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        session()->flash('message', "User has been deleted successfully!");
        redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('livewire.admin.admin-delete-user-component');
    }
}
