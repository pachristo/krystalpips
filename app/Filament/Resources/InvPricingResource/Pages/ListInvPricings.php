<?php

namespace App\Filament\Resources\InvPricingResource\Pages;

use App\Filament\Resources\InvPricingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInvPricings extends ListRecords
{
    protected static string $resource = InvPricingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
