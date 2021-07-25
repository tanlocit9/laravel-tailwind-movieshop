<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\PayMode;
use App\Models\Ticket;
use App\Models\TicketStatus;
use Livewire\Component;

class TicketEdit extends Component
{
    public function render()
    {
        return view('livewire.backend.modal.ticket-edit');
    }
    public $ticket;
    public $payModes;
    public $statuses;
    public $status;
    public $payMode;
    protected $listeners = ['openTicketEditModal' => 'openTicketEditModal'];

    public function mount()
    {
        $this->payModes = PayMode::all();
        $this->statuses = TicketStatus::all();
    }

    public function openTicketEditModal($id)
    {
        $this->ticket = Ticket::find($id);
        $this->status = $this->ticket->ticket_status_id;
        $this->payMode = $this->ticket->paymode_id;
        $this->dispatchBrowserEvent('open-ticket-edit');
    }

    public function closeTicketEditModal()
    {
        $this->dispatchBrowserEvent('close-ticket-edit');
    }
    public function save()
    {
        $this->ticket->paymode_id = $this->payMode;
        $this->ticket->ticket_status_id = $this->status;
        $this->ticket->save();
        $this->emit('refresh','ticket');
    }
}
