<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatablesUser extends LivewireDatatable
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

            Column::name('email'),

            DateColumn::name('created_at')
                ->label('Creation Date')
        ];
    }
}
