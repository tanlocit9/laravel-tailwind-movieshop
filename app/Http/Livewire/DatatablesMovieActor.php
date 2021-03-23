<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatablesMovieActor extends LivewireDatatable
{
    public $model = Movie::class;
    public function builder()
    {
        return Movie::with(['main_genre','sub_genre','genres']);
    }
    public function columns()
    {
        return [
            Column::name('title')
                    ->editable()
                    ->label('Title')
                    ->linkTo('movies')
                    ->searchable(),
            Column::callback(['id'],function($id){
                if(Movie::find($id)->main_actor()->count())
                    return Movie::find($id)->main_actor()->pluck('full_name')->join(', ').'.';
                else
                    return "No data.";
            })->label('Directors'),
            Column::callback(['id','title'],function($id){
                if(Movie::find($id)->sub_actor()->count())
                    return Movie::find($id)->sub_actor()->pluck('full_name')->join(', ').'.';
                else
                    return "No data.";
            })->label('Casts'),
            Column::delete()->label('delete')
        ];
    }
}
