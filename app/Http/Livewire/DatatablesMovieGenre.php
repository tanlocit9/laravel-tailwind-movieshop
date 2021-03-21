<?php

namespace App\Http\Livewire;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatablesMovieGenre extends LivewireDatatable
{
    public $model = Movie::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->defaultSort('asc'),

            Column::name('title')
                    ->editable()
                    ->label('Title')
                    ->linkTo('movies')
                    ->searchable(),

            Column::callback(['id'],function($id){
                return Movie::find($id)->main_genre->first()->genre_name;
            })->label('Main genre'),
            Column::callback(['id','title'],function($id){
                return Movie::find($id)->sub_genre()->pluck('genre_name')->join(', ');
            })->label('Sub genres'),
            Column::delete()->label('delete')
        ];
    }
}
