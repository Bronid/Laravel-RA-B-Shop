<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminEditUserComponent extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $role;
    public $password;
    public $balance;

    public function updated($fields){
        $this->validateOnly($fields, [
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
            'balance'=>'required|numeric|min:0'
        ]);
    }

    public function updateProduct(){
        $this->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
            'balance'=>'required|numeric|min:0'
        ]);
        $user = User::find($this->user_id);
        $user->id = $this->user_id;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->password = $this->password;
        $user->balance = $this->balance;
        $user->save();   
        session()->flash('message', 'User has been updated succesfully!');
        redirect()->route('admin.dashboard');
    }

    public function mount($user_id)
    {
        $user = User::find($user_id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->password = $user->password;
        $this->balance = $user->balance;
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-user-component');
    }
}
