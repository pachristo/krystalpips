<?php

namespace App\Filament\Resources\MenPricingResource\Pages;

use App\Filament\Resources\MenPricingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenPricings extends ListRecords
{
    protected static string $resource = MenPricingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
