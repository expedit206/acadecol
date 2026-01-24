<?php

namespace App\Filament\Resources\Modules\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;


class ModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Détails du Module')->schema([
                    Select::make('formation_id')
                        ->relationship('formation', 'slug')
                        ->getOptionLabelFromRecordUsing(fn ($record) => $record->titre['fr'] ?? $record->slug) // Show FR title
                        ->searchable()
                        ->preload()
                        ->required(),
                    Grid::make(2)->schema([
                        TextInput::make('titre.fr')->label('Titre (FR)')->required(),
                        TextInput::make('titre.en')->label('Title (EN)')->required(),
                    ]),
                    Grid::make(2)->schema([
                        RichEditor::make('contenu.fr')->label('Contenu (FR)'),
                        RichEditor::make('contenu.en')->label('Content (EN)'),
                    ]),
                    TextInput::make('ordre')->numeric()->default(0),
                ])
            ]);
    }
}
