<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatablesMovieGenre extends LivewireDatatable
{
    public $model = Movie::class;

    public function builder()
    {
        return Movie::with(['genres']);
    }
    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->defaultSort('asc'),

            Column::name('title')
                    ->editable()
                    ->label('Title')
                    ->searchable(),
            Column::name('genres.genre_name')
                    ->label('Genres'),
            // Column::callback(['id','title'],function($id){
            //     return Movie::find($id)->main_genre->first()->genre_name;
            // })->label('Main genre'),
            // Column::callback(['id','type_id'],function($id){
            //     return Movie::find($id)->sub_genre()->pluck('genre_name')->join(', ').'.';
            // })->label('Sub genres'),
            Column::callback(['id'], function ($id) {
                return view('livewire.actions.action-edit-genres', ['id' => $id]);
            })
        ];
    }

}
