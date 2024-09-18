<?php

namespace App\Filament\Resources\TradesResource\Pages;

use App\Filament\Resources\TradesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrades extends EditRecord
{
    protected static string $resource = TradesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
