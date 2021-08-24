<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Theater;
use Livewire\Component;

class ScheduleCreate extends Component
{
    public $theater;
    public $movie;
    public $date;
    public $theaters;
    public $movies;
    protected $listeners = ['openScheduleAddModal' => 'openScheduleAddModal'];
    protected $rules = [
        'theater' => 'required|not_in:0',
        'movie' => 'required|not_in:0',
        'date' => 'date_format:Y-m-d|after:today'
    ];
    public function mount()
    {
        $this->theaters = Theater::all();
        $this->movies = Movie::all();
        $this->theater = 0;
        $this->movie = 0;
    }

    public function saveSchedule()
    {
        $validatedData = $this->validate();
        Schedule::create([
            'date'=>$validatedData['date'],
            'theater_id'=>$validatedData['theater'],
            'movie_id'=>$validatedData['movie'],
        ]);
        $this->emit('openInformModal', "Schedule create", "Success");
        $this->closeScheduleAddModal();
    }
    public function openScheduleAddModal()
    {
        $this->dispatchBrowserEvent('open-schedule-create');
    }

    public function closeScheduleAddModal()
    {
        $this->dispatchBrowserEvent('close-schedule-create');
    }

    public function render()
    {
        return view('livewire.backend.modal.schedule-create');
    }
}
