<?php

namespace App\Http\Livewire\Backend\Datatable;

use App\Models\Genre;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DTGenre extends LivewireDatatable
{
    public $model = Genre::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID'),
            Column::name('genre_name')->label('Genre Name'),
            Column::name('genre_description')->label('Discription'),
            Column::delete()->label('delete')
        ];
    }
}
