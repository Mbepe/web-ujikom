<?php

namespace App\Filament\Resources\PoskoNaruResource\Pages;

use App\Filament\Resources\PoskoNaruResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPoskoNaru extends EditRecord
{
    protected static string $resource = PoskoNaruResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
