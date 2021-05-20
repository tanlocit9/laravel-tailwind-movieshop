<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Price;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookTicket extends Component
{
    public $movie;
    public $amount;
    public $total_price;
    public $cart_item;
    public $user;
    public $cart;
    public $prices;
    public $total_ticket;
    public $total_combo;
    public function mount($movie)
    {
        $this->movie = $movie;
        $this->amount = array_fill(1,Price::all()->count(),0);
        $this->total_price = array_fill(1,Price::all()->count(),0);
        $this->user= Auth::user();
        $this->prices = Price::all();
    }
    public function render()
    {
        $this->countPrice($this->prices);
        return view('livewire.frontend.book-ticket');
    }

    public function increase($price_id){
        $this->amount[$price_id]++;
    }
    public function decrease($price_id){
        if($this->amount[$price_id]!=0)
        $this->amount[$price_id]--;
    }
    public function countPrice($prices){
        $this->total_ticket=0;
        $this->total_combo=0;
        foreach($prices as $price){
            if($this->amount[$price->id]!="")
                $this->total_price[$price->id]= (int) $this->amount[$price->id]*$price->price;
            else $this->total_price[$price->id]=0;
        }
        for($i =1; $i<=3;$i++){
            $this->total_ticket+=$this->total_price[$i];
            $this->total_combo+=$this->total_price[$i+3];
        }
    }
}
