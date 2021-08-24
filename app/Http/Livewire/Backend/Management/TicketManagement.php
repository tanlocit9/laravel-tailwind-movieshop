<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Ticket;
use Livewire\Component;

class TicketManagement extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Ticket::all();
    }
    public function render()
    {
        $this->items = Ticket::all();
        $this->emit('datatable', 'ticket');
        return view('livewire.backend.management.ticket-management');
    }
}
