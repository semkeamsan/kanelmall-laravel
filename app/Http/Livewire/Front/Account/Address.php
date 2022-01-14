<?php

namespace App\Http\Livewire\Front\Account;

use Livewire\Component;
use App\Models\Province;
use Illuminate\Support\Str;

class Address extends Component
{
    public $rules = [
        'province' => 'required',
        'district' => 'required',
        'commune' => 'required',
        'address' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
    ];
    public $attributes;
    public $response;
    public $provinces;
    public $province;
    public $districts;
    public $district;
    public $communes;
    public $commune;
    public $villages;
    public $village;
    public $address;
    public $latitude;
    public $longitude;
    public function mount()
    {
        $this->province = request()->user()->province_id;
        $this->district = request()->user()->district_id;
        $this->commune = request()->user()->commune_id;
        $this->village = request()->user()->village_id;
        $this->address = request()->user()->address;
        $this->latitude = request()->user()->latitude;
        $this->longitude = request()->user()->longitude;
    }

    public function render()
    {
        $this->provinces = Province::get();
        if ($this->province) {
            $this->districts = Province::find($this->province)->districts;
        }
        if ($this->districts) {
            $a = Province::find($this->province)->districts->find($this->district);
            if ($a) {
                $this->communes = $a->communes;
            } else {
                $this->communes = [];
                $this->villages = [];
            }
        }
        if ($this->communes) {
            $a = Province::find($this->province)->districts->find($this->district)->communes->find($this->commune);
            if ($a) {
                $this->villages = $a->villages;
            } else {
                $this->villages = [];
            }
        }



        return view('livewire.front.account.address');
    }
    public function samelocation()
    {
        $this->address = $this->provinces->find($this->province)->translation->name;
        $this->address .= ', ' . $this->districts->find($this->district)->translation->name;
        $this->address .= ', ' . $this->communes->find($this->commune)->translation->name;
    }

    public function update()
    {
        $this->response = [
            'type' => 'error',
            'message' => __('Update Unsucessfully'),
        ];

        foreach ($this->rules as $key => $value) {
            $this->attributes[$key] = Str::title($key);
        }
        $this->validate($this->rules, [], $this->attributes);

        request()->user()->update([
            'province_id' => $this->province,
            'district_id' => $this->district,
            'commune_id' => $this->commune,
            'village_id' => $this->village,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
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
