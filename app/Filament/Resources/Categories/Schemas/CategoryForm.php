<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identité')->schema([
                    Grid::make(2)->schema([
                        TextInput::make('nom.fr')
                            ->label('Nom (Français)')
                            ->required(),
                        TextInput::make('nom.en')
                            ->label('Name (English)')
                            ->required(),
                    ]),
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    Select::make('parent_id')
                        ->relationship('parent', 'slug') // Fallback to slug/id since JSON label support varies
                        ->label('Catégorie Parente')
                        ->placeholder('Sélectionner une catégorie parente')
                        ->searchable(),
                    TextInput::make('icon_class')
                        ->label('Icon Class (Heroicon)')
                        ->placeholder('heroicon-o-home'),
                    TextInput::make('ordre_affichage')
                        ->numeric()
                        ->default(0),
                ]),
                Section::make('Description')->schema([
                    Textarea::make('description.fr')->label('Description (FR)'),
                    Textarea::make('description.en')->label('Description (EN)'),
                ])
            ]);
    }
}
