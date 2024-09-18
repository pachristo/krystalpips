<?php

namespace App\Filament\Resources\AccountManagementResource\Pages;

use App\Filament\Resources\AccountManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccountManagement extends EditRecord
{
    protected static string $resource = AccountManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
