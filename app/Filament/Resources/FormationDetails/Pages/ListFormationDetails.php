<?php

namespace App\Filament\Resources\FormationDetails\Pages;

use App\Filament\Resources\FormationDetails\FormationDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormationDetails extends ListRecords
{
    protected static string $resource = FormationDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
