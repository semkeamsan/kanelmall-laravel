<?php

namespace App\Http\Livewire\Front\Account;

use App\Http\Controllers\Front\ApiController;
use Livewire\Component;

class Notify extends Component
{
    public $orders = [];
    public function render()
    {
        return view('livewire.front.account.notify');
    }
    public function todo(){
        return;
         $transactions = (new ApiController)->transactions();
         if($transactions){
            $ids =  array_column($transactions,'id');
            $this->orders = request()->user()->orders->whereIn('transaction_id',$ids);
         }
    }
    public function close(){
        $this->orders = [];
    }
}
