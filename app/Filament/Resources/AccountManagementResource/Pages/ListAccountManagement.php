<?php

namespace App\Filament\Resources\AccountManagementResource\Pages;

use App\Filament\Resources\AccountManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccountManagement extends ListRecords
{
    protected static string $resource = AccountManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
