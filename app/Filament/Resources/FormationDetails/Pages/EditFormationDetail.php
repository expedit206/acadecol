<?php

namespace App\Filament\Resources\FormationDetails\Pages;

use App\Filament\Resources\FormationDetails\FormationDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormationDetail extends EditRecord
{
    protected static string $resource = FormationDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
