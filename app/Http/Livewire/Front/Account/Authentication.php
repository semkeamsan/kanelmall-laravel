<?php

namespace App\Http\Livewire\Front\Account;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Authentication extends Component
{
    public $response;

    public $email;
    public $phone;
    public $password;
    public $auths = [];

    public $rules = [];

    public function mount()
    {
        $this->email = request()->user()->email;
        $this->phone = request()->user()->phone;

        if ($this->email) {
            $this->rules['email'] = 'required|unique:users,email,' . auth()->id();
        }

        if ($this->phone) {
            $this->rules['phone'] = 'required|unique:users,phone,' . auth()->id();
        }
        $this->auths = request()->user()->auths;
    }

    public function render()
    {
        return view('livewire.front.account.authentication');
    }

    public function authremove($index)
    {
        unset($this->auths[$index]);
    }

    public function update()
    {
        $this->response = [
            'type' => 'error',
            'message' => __('Update Unsucessfully'),
        ];

        if ($this->email) {
            $this->rules['email'] = 'required|unique:users,email,' . auth()->id();
        }

        if ($this->phone) {
            $this->rules['phone'] = 'required|unique:users,phone,' . auth()->id();
        }
        if ($this->password) {
            $this->rules['password'] = 'min:6';
        }
        $this->validate($this->rules, [], [
            'email' => __('Email'),
            'phone' => __('Phone Number'),
            'password' => __('Password'),
        ]);

        request()->user()->update([
            'email' => $this->email,
            'email_verified_at' => $this->email != request()->user()->email ? null : request()->user()->email_verified_at,
            'phone' => $this->phone,
            'phone_verified_at' => $this->phone != request()->user()->phone ? null : request()->user()->phone_verified_at,
            'password' => $this->password ? Hash::make($this->password): request()->user()->password,

        ]);

        $auths = request()->user()->auths()->whereNotIn('id',$this->auths->pluck('id'));
        if($auths->count()){
            $auths->delete();
        }

        $this->response = [
            'type' => 'success',
            'message' => __('Update Successfully'),
        ];
    }

    public function hydrate()
    {
        $this->response = null;
    }
}
