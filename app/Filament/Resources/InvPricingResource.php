<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvPricingResource\Pages;
use App\Filament\Resources\InvPricingResource\RelationManagers;
use App\Models\InvPricing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvPricingResource extends Resource
{
    protected static ?string $model = InvPricing::class;
    protected static ?string $navigationGroup = 'Pricing';
    public static function getNavigationGroupIcon(): ?string
    {
        return 'heroicon-o-currency-dollar'; // Adjust the icon based on your needs.
    }
 public static function getPluralModelLabel(): string
 {
     return 'Investment Pricings'; // Plural label
 }

 public static function getModelLabel(): string
 {
     return 'Investment Pricing'; // Singular label
 }
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                   // Name field as a plain text input
                   Forms\Components\TextInput::make('name')
                   ->label('Name')
                   ->columnSpanFull()
                   ->required(),

                   Forms\Components\TextInput::make('duration')
                   ->label('Duration (please use the folowing format eg. 1 month,2 months,1 Week, 2 weeks')
                   ->columnSpanFull()
                 ,



                       Forms\Components\TextInput::make('price')
                           ->label('Price ($)')
                           ->numeric()


                   ->columnSpanFull()
                   ->required(),


               // Benefits as repeatable text inputs
               Forms\Components\Repeater::make('benefits')
                   ->label('Benefits')
                   ->schema([
                       Forms\Components\TextInput::make('benefit')
                           ->label('Benefit')
                           ->required(),
                   ])
                   ->columnSpanFull()
                   ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->label('Name'),
                // Tables\Columns\TextColumn::make('price')->label('Price'),
                // Display duration as unit and price
                Tables\Columns\TextColumn::make('duration')->label('Duration'),

                Tables\Columns\TextColumn::make('price')->label('Price ($)'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListInvPricings::route('/'),
            'create' => Pages\CreateInvPricing::route('/create'),
            'edit' => Pages\EditInvPricing::route('/{record}/edit'),
        ];
    }
}
