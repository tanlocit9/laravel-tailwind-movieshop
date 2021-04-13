<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Session;
use App\Models\Theater;
use Livewire\Component;

class ShowTime extends Component
{
    public $tab='byMovie';
    public $selectedMovie;
    public $selectedTheater;
    public $theater_ids;
    public $movie_ids;
    public $theaters;
    public $movies;
    public $sessions;
    public function render()
    {
        // Hiển thị danh sách phim đang chiếu.
        if($this->tab=='byMovie'){
            $this->movie_ids=Schedule::all()->pluck('movie_id');
        }else $this->theater_ids= Schedule::all()->pluck('theater_id');

        // Hiển thị rạp nào đang chiếu phim đó.
        if($this->theater_ids){
            $this->theaters=Theater::find($this->theater_ids);
        }
        if($this->movie_ids){
            $this->movies=Movie::find($this->movie_ids);
        }
        return view('livewire.show-time');
    }
    public function changeTab($tab){
        $this->tab=$tab;
        $this->sessions='';
    }
    public function selectMovie($id)
    {
        if($this->tab=="byMovie"){
            $this->selectedMovie=$id;
            $this->sessions='';
            $this->theater_ids = Schedule::where('movie_id',$id)->pluck('theater_id');
        }
        else{
            $schedule_ids = Schedule::where('theater_id',$this->selectedTheater)->where('movie_id',$id)->pluck('id');
            $this->sessions = Session::with('schedule')->whereIn('schedule_id',$schedule_ids)->get()->groupBy('schedule.date')->collect();
            }
    }
    public function selectTheater($id)
    {
        if($this->tab=="byMovie"){
            $schedule_ids = Schedule::where('movie_id',$this->selectedMovie)->where('theater_id',$id)->pluck('id');
            $this->sessions = Session::with('schedule')->whereIn('schedule_id',$schedule_ids)->get()->groupBy('schedule.date')->collect();
        }
        else{
            $this->selectedTheater=$id;
            $this->sessions='';
            $this->movie_ids = Schedule::where('theater_id',$id)->pluck('movie_id');
            }
    }
}
