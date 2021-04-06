<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Theater;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatablesSchedule extends LivewireDatatable
{
    public $model=Schedule::class;

    public function columns()
    {
        return [
            Column::name('id')->label('ID')->defaultSort('asc'),
            DateColumn::name('date')->label('Date')->searchable()->editable(),
            Column::callback(['theater_id'],function($theater_id){
                return Theater::find($theater_id)->theater_name;
            })->label('Theater'),
            Column::callback(['movie_id'],function($movie_id){
                return Movie::find($movie_id)->title;
            })->label('Movie'),
            Column::delete()->label('delete')
        ];
    }
}
