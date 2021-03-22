<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatablesActor extends LivewireDatatable
{
    public $model = Actor::class;
    public $hideable = 'select';
    public function columns()
    {
        return [
            Column::name('id')->label('ID')->defaultSort('asc'),
            Column::name('full_name')->label('Name')->searchable()->editable(),
            Column::callback(['gender'],function($gender){return $gender ?'male':'female';})->label('Gender'),
            BooleanColumn::name('gender')->label('Gender ID')->editable()->hide(),
            Column::delete()->label('delete')
        ];
    }
}
