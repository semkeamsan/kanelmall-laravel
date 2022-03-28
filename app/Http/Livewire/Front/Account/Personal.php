<?php

namespace App\Http\Livewire\Front\Account;

use Livewire\Component;
use App\Helpers\FileHelper;
use Livewire\WithFileUploads;

class Personal extends Component
{
    use WithFileUploads;
    public $name;
    public $gender;
    public $dob;
    public $about;
    public $avatar;
    public $response;
    public $rules = [
        'name' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        //'avatar' => 'image|max:1024',
    ];
    protected $listeners = ['update'];
    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->gender = auth()->user()->gender;
        $this->dob = auth()->user()->dob;
        $this->about = auth()->user()->about;
        $this->avatar = auth()->user()->avatar;
    }

    public function render()
    {
        return view('livewire.front.account.personal');
    }

    public function update()
    {
        $this->response = [
            'type' => 'danger',
            'message' => __('Update Unsucessfully'),
        ];

        $this->validate($this->rules, [], [
            'name' => __('Name'),
            'gender' => __('Gender'),
            'dob' => __('Date of Birth'),
        ]);
        $filename = auth()->user()->id.'-'.slug(auth()->user()->name) . '-avatar';
        request()->user()->update([
            'name' => $this->name,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'about' => $this->about,
            'avatar' => FileHelper::move($this->avatar,'users',$filename) ?? $this->avatar,
        ]);
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
