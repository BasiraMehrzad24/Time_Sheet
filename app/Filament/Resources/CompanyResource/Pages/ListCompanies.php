<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Table;
use Filament\Tables;

class ListCompanies extends ListRecords
{

    protected static string $resource = CompanyResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('description')->sortable(),
                Tables\Columns\TextColumn::make('logo')->sortable(),
            ])
            ->defaultSort('name');
    }


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
