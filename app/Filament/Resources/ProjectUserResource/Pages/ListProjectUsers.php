<?php

namespace App\Filament\Resources\ProjectUserResource\Pages;

use App\Filament\Resources\ProjectUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectUsers extends ListRecords
{
    protected static string $resource = ProjectUserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
