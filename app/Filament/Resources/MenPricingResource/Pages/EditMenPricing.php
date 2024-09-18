<?php

namespace App\Filament\Resources\MenPricingResource\Pages;

use App\Filament\Resources\MenPricingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMenPricing extends EditRecord
{
    protected static string $resource = MenPricingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
