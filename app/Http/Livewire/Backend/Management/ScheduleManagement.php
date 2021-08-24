<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Calendar;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Theater;
use Livewire\Component;

class ScheduleManagement extends Component
{
    public $items;
    public $movies;
    public $theaters;
    public $schedules;
    public $currentDate;
    public $calendars;
    public function mount()
    {
        $this->movies = Movie::all();
        $this->theaters = Theater::all();
        $this->schedules = Schedule::all()->sortBy('date')->groupBy('date')->collect();
        if ($this->schedules->count() != 0) {
            $this->currentDate = $this->schedules->first()[0]->date;
        }
        $this->selectDate($this->currentDate);
    }

    public function selectDate($date)
    {
        $this->currentDate = $date;
        $scheduleIds = Schedule::findByDate($date)->get()->pluck('id');
        $this->calendars = Calendar::whereIn('schedule_id', $scheduleIds)->get();
    }

    public function deleteCurrentDate()
    {
        Schedule::findByDate($this->currentDate)->delete();
    }

    public function render()
    {
        $this->items = Schedule::all();
        $this->emit('datatable', 'schedule');
        $this->schedules = Schedule::all()->sortBy('date')->groupBy('date')->collect();
        return view('livewire.backend.management.schedule-management');
    }
}
