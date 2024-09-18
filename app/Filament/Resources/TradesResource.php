<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TradesResource\Pages;
use App\Filament\Resources\TradesResource\RelationManagers;
use App\Models\Trades;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
class TradesResource extends Resource
{
    protected static ?string $model = Trades::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


DatePicker::make('date')
    ->format('d/m/Y'),
                Forms\Components\TextInput::make('name')

                    ->maxLength(255),
                Forms\Components\Textarea::make('description'),

                Forms\Components\TextInput::make('amount')

                    ->required(),

                Forms\Components\TextInput::make('video_url')

                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('type'),

                Tables\Columns\ImageColumn::make('image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrades::route('/'),
            'create' => Pages\CreateTrades::route('/create'),
            'edit' => Pages\EditTrades::route('/{record}/edit'),
        ];
    }
}
