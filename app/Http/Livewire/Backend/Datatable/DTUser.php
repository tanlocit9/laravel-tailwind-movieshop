<?php

namespace App\Http\Livewire\Backend\Datatable;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DTUser extends LivewireDatatable
{
    public function builder()
    {
        return User::query();
    }
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id')
                ->defaultSort('asc')
                ->searchable(),

            Column::name('name')
                ->editable()
                ->label('Name'),

            Column::name('email')->editable(),

            DateColumn::name('created_at')
                ->label('Creation Date'),

            Column::delete()->label('delete')
        ];
    }
}
