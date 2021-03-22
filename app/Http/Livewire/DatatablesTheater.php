<?php

namespace App\Http\Livewire;

use App\Models\Theater;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatablesTheater extends LivewireDatatable
{
    public $model = Theater::class;

    public function columns()
    {
        return [
            Column::name('id')->label('ID')->defaultSort('asc'),
            Column::name('theater_name')->label('Name'),
            Column::name('theater_address')->label('Adress'),
            Column::name('theater_phone')->label('Phone'),
        ];
    }
}
