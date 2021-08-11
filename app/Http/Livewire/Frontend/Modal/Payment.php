<?php

namespace App\Http\Livewire\Frontend\Modal;

use App\Models\PayMode;
use App\Models\Price;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Payment extends Component
{
    public $payModes;
    public $user;
    public $movie;
    public $calendar;
    public $schedule;
    public $theater;
    public $totalPrice;
    public $amount;
    public $payModeId;
    public $selectedSeat;
    public $tab;
    protected $listeners = ['openPaymentForm' => 'openPaymentForm'];
    public function mount($movie, $calendar)
    {
        $this->tab = "direct";
        $this->payModeId = PayMode::all()->count();
        $this->payModes = PayMode::all();
        $this->user = Auth::user();
        $this->movie = $movie;
        $this->calendar = $calendar;
        $this->schedule = $calendar->schedule;
        $this->theater = $calendar->schedule->theater;
        $this->totalPrice = session("sessionTotalPriceTickets") + session("sessionTotalPriceCombos");
        $this->amount = session('sessionAmount');
    }
    public function openPaymentForm($selectedSeat, $fullUrl)
    {
        $this->selectedSeat = $selectedSeat;
        session()->flash('qrcode', $fullUrl);
        $this->dispatchBrowserEvent('open-payment-form');
    }
    public function book()
    {
        $tickets = Ticket::create(['total_price' => $this->totalPrice, "user_id" => $this->user->id, "calendar_id" => $this->calendar->id, "paymode_id" => $this->payModeId]);
        foreach ($this->amount as $k => $v) {
            if ($v != 0) {
                $price = Price::find($k);
                if (Price::checkIsTicketType($k)) {
                    $seat = array_shift($this->selectedSeat);
                    $tickets->prices()->attach($k, ['name' => $price->name, 'amount' => $v, 'seat' => "$seat"]);
                } else {
                    $tickets->prices()->attach($k, ['name' => $price->name, 'amount' => $v, 'seat' => ""]);
                }
            }
        }
        $this->emit('openInformModal', "Book tickets", "success");
    }

    public function selectPayMode($payModeId)
    {
        $this->payModeId = $payModeId;
    }
    public function render()
    {
        return view('livewire.frontend.modal.payment');
    }
}
