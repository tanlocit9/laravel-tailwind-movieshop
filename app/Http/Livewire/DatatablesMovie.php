<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use App\Models\Rating;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatablesMovie extends LivewireDatatable
{
    public function builder()
    {
        return Movie::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->linkTo('movies')->defaultSort('asc'),

            Column::name('title')
                    ->editable()
                    ->label('Title')
                    ->searchable(),

            TimeColumn::name('duration')->label('Duration'),

            DateColumn::name('release_date')->label('Release date'),

            Column::name('description')->label('Description')->truncate(30),

            NumberColumn::name('age_limit')->label('Age limit'),

            // NumberColumn::name('ratings.star:avg')->filterable()->label('Average Rated'),
            NumberColumn::callback(['id'],function($id){
                return round(Rating::where('movie_id',$id)->avg('star'),1);
            })->label('Average rated'),
        ];
    }
}
