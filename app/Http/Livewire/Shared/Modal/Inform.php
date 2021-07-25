<?php

namespace App\Http\Livewire\Shared\Modal;

use Livewire\Component;

class Inform extends Component
{
    public $type;
    public $message;
    protected $listeners = ['openInformModal' => 'openInformModal'];
    public function render()
    {
        return view('livewire.shared.modal.inform');
    }
    public function openInformModal($message, $type)
    {
        $this->type = $type;
        $this->message = $message;
        $this->dispatchBrowserEvent('open-inform-modal');
    }
    public function close()
    {
        $this->emit('changeTab', 'index');
    }
}
