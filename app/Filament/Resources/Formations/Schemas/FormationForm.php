<?php

namespace App\Filament\Resources\Formations\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class FormationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Formation')->tabs([
                    Tabs\Tab::make('Informations Clés')->schema([
                        Select::make('category_id')
                            ->relationship('category', 'slug')
                            ->label('Catégorie')
                            ->searchable()
                            ->required(),
                        Grid::make(2)->schema([
                            TextInput::make('titre.fr')->label('Titre (FR)')->required(),
                            TextInput::make('titre.en')->label('Title (EN)')->required(),
                        ]),
                        TextInput::make('slug')->required()->unique(ignoreRecord: true),
                        
                        Grid::make(3)->schema([
                            TextInput::make('prix')->numeric()->prefix('FCFA'),
                            TextInput::make('duree')->label('Durée (ex: 12 mois)'),
                            TextInput::make('niveau_entree')->label('Niveau Requis'),
                        ]),
                        Toggle::make('is_featured')->label('À la Une (Accueil)'),
                    ]),
                    Tabs\Tab::make('Description & Contenu')->schema([
                        Section::make('Résumé (Cartes)')->schema([
                             Textarea::make('description_courte.fr')->label('Résumé FR')->rows(3),
                             Textarea::make('description_courte.en')->label('Summary EN')->rows(3),
                        ]),
                        Section::make('Description Complète')->schema([
                             RichEditor::make('description_complete.fr')->label('Contenu (FR)'),
                             RichEditor::make('description_complete.en')->label('Content (EN)'),
                        ]),
                    ]),
                    Tabs\Tab::make('Carrière & Prérequis')->schema([
                        RichEditor::make('debouches.fr')->label('Débouchés (FR)'),
                        RichEditor::make('prerequis.fr')->label('Prérequis (FR)'),
                    ])
                ])->columnSpanFull()
            ]);
    }
}
