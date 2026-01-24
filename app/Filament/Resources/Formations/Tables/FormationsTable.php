<?php

namespace App\Filament\Resources\Formations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class FormationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titre.fr')
                    ->label('Formation')
                    ->searchable()
                    ->sortable()
                    ->description(fn($record) => $record->slug),
                TextColumn::make('category.nom.fr')
                    ->label('Catégorie')
                    ->sortable(),
                TextColumn::make('prix')
                    ->money('XAF')
                    ->label('Prix')
                    ->sortable(),
                TextColumn::make('duree')
                    ->label('Durée'),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('À la une')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
