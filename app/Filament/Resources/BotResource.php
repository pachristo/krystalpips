<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BotResource\Pages;
use App\Filament\Resources\BotResource\RelationManagers;
use App\Models\Bot;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;

class BotResource extends Resource
{
    protected static ?string $model = Bot::class;
    protected static ?string $recordTitleAttribute = 'Bot Price';
    protected static ?string $navigationGroup = 'Pricing';
    // protected static ?string $navigationGroup = 'Shop';
      protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
      public static function getModelLabel(): string
      {
          return 'Bot Pricing'; // Singular label
      }
      public static function form(Form $form): Form
      {
          return $form
              ->schema([
                  TextInput::make('name')
                      ->required()
                      ->columnSpanFull()
                      ->maxLength(255),

                  Textarea::make('summary')

                  ->columnSpanFull()
                      ->required(),



                  FileUpload::make('image')

                  ->columnSpanFull()
                      ->image(),

                  TextInput::make('price')
                      ->numeric()

                      ->columnSpanFull()
                      ->required(),

                  DatePicker::make('date')

                  ->columnSpanFull()
                      ->required(),

                  // Timestamps are usually handled automatically, no need to add them in the form.
              ]);
      }

      public static function table(Table $table): Table
      {
          return $table
              ->columns([
                  TextColumn::make('name')
                      ->sortable()
                      ->searchable(),

                  TextColumn::make('summary')
                      ->limit(50)
                      ->sortable()
                      ->searchable(),



                  TextColumn::make('price')
                      ->sortable(),



                  TextColumn::make('date')
                      ->date()
                      ->sortable(),
              ])
              ->filters([
                  //
              ])
              ->actions([
                  Tables\Actions\EditAction::make(),
                  Tables\Actions\DeleteAction::make(),
              ])
              ->bulkActions([
                  Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBots::route('/'),
            'create' => Pages\CreateBot::route('/create'),
            'edit' => Pages\EditBot::route('/{record}/edit'),
        ];
    }
}
