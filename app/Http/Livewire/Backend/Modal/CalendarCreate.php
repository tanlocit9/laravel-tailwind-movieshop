<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\Calendar;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Theater;
use Livewire\Component;

class CalendarCreate extends Component
{
    public $room;
    public $rooms;
    public $hours;
    public $minutes;
    public $movie;
    public $theater;
    public $movies;
    public $theaters;
    public $schedule;
    public $scheduleIds;
    public $currentTheater;
    protected $listeners = ['openCalendarAddModal' => 'openCalendarAddModal'];
    public function mount()
    {
        $this->room = 0;
        $this->theater = 0;
        $this->movie = 0;
        $this->rooms = Room::all()->where('theater_id',$this->theater);
        $this->theaters = Theater::all();
        $this->movies = Movie::all();
    }

    public function openCalendarAddModal($date)
    {
        $this->scheduleIds = Schedule::findByDate($date)->get()->pluck('id');
        $movieIds = Schedule::findByDate($date)->get()->pluck('movie_id');
        $this->movies = Movie::find($movieIds);
        $theaterIds = Schedule::findByDate($date)->get()->pluck('theater_id');
        $this->theaters = Theater::find($theaterIds);
        $this->dispatchBrowserEvent('open-calendar-create');
    }

    public function closeCalendarAddModal()
    {
        $this->dispatchBrowserEvent('close-calendar-create');
    }
    public function saveCalendar()
    {
        $seconds = $this->hours * 3600 + $this->minutes * 60;
        $schedule = Schedule::find($this->scheduleIds)->where('movie_id', $this->movie)->where('theater_id', $this->theater)->first();
        Calendar::create([
            'time_start' => date('H:i', $seconds),
            'room_id' => $this->room,
            'schedule_id' => $schedule->id
        ]);
        $this->emit('openInformModal', "Calendar create", "Success");
        $this->closeCalendarAddModal();
    }
    public function render()
    {
        if ($this->hours > 24) {
            $this->hours = 24;
        }
        if ($this->minutes > 59) {
            $this->minutes = 59;
        }
        if ($this->hours < 0) {
            $this->hours = 0;
        }
        if ($this->minutes < 0) {
            $this->minutes = 0;
        }
        $this->currentTheater=$this->theater;
        return view('livewire.backend.modal.calendar-create');
    }
}
