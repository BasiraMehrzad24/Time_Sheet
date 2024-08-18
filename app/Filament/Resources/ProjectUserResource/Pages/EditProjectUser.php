<?php

namespace App\Filament\Resources\ProjectUserResource\Pages;

use App\Filament\Resources\ProjectUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectUser extends EditRecord
{
    protected static string $resource = ProjectUserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
