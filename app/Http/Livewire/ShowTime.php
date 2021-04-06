<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Session;
use App\Models\Theater;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowTime extends Component
{
    public $tab='byMovie';
    public $selectedMovie;
    public $theater_ids;
    public $theaters;
    public $sessions;
    public function render()
    {
        // Hiển thị danh sách phim đang chiếu.
        $movies=Movie::limit(8)->get();
        // Hiển thị rạp nào đang chiếu phim đó.
        if($this->theater_ids){
            // $rooms_ids = Room::where('movie_id',;
            $this->theaters=Theater::find($this->theater_ids);
        }
        return view('livewire.show-time',compact('movies'));
    }
    public function changeTab($tab){
        $this->tab=$tab;
    }
    public function selectMovie($id)
    {
        $this->selectedMovie=$id;
        $this->sessions='';
        $this->theater_ids = Schedule::where('movie_id',$id)->pluck('theater_id');
    }
    public function selectTheater($id)
    {
        $schedule_ids = Schedule::where('movie_id',$this->selectedMovie)->where('theater_id',$id)->pluck('id');
        $this->sessions = Session::with('schedule')->whereIn('schedule_id',$schedule_ids)->get()->groupBy('schedule.date')->collect();
    }
}
