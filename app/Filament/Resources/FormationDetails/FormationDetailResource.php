<?php

namespace App\Filament\Resources\FormationDetails;

use App\Filament\Resources\FormationDetails\Pages\CreateFormationDetail;
use App\Filament\Resources\FormationDetails\Pages\EditFormationDetail;
use App\Filament\Resources\FormationDetails\Pages\ListFormationDetails;
use App\Filament\Resources\FormationDetails\Schemas\FormationDetailForm;
use App\Filament\Resources\FormationDetails\Tables\FormationDetailsTable;
use App\Models\FormationDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FormationDetailResource extends Resource
{
    protected static ?string $model = FormationDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return FormationDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormationDetailsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormationDetails::route('/'),
            'create' => CreateFormationDetail::route('/create'),
            'edit' => EditFormationDetail::route('/{record}/edit'),
        ];
    }
}
