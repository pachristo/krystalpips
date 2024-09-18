<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


// use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;


    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('facebook')
                    ->label('Facebook')
                    ->nullable()
                    ->maxLength(255),
                TextInput::make('twitter')
                    ->label('Twitter')
                    ->nullable()
                    ->maxLength(255),
                TextInput::make('instagram')
                    ->label('Instagram')
                    ->nullable()
                    ->maxLength(255),
                TextInput::make('youtube')
                    ->label('YouTube')
                    ->nullable()
                    ->maxLength(255),
                    TextInput::make('telegram')
                    ->label('Telegram Channel')
                    ->nullable()
                    ->maxLength(255),

   TextInput::make('free_signal')
                    ->label('Free Signal  Link')
                    ->nullable()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->nullable()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->nullable()
                    ->maxLength(255),
                    TextInput::make(name: 'paypal')
                    ->label('Paypal Address')

                    ->nullable()
                    ->maxLength(255),
                    TextInput::make(name: 'btc')
                    ->label('Bitcoin Address')

                    ->nullable()
                    ->maxLength(255),
                    TextInput::make(name: 'usdt')
                    ->label('Usdt Address')

                    ->nullable()
                    ->maxLength(255),
                    TextInput::make(name: 'skrill')
                    ->label('Skrill Address')

                    ->nullable()
                    ->maxLength(255),
                    TextInput::make(name: 'net')
                    ->label('Neteller Address')

                    ->nullable()
                    ->maxLength(255),
                    TextInput::make(name: 'pm')
                    ->label('Perfect Money Address')

                    ->nullable() ,

                    RichEditor::make(name: 'wu')
                    ->label('Western Address')

                    ->nullable()  ,


                    RichEditor::make(name: 'mg')
                    ->label('Money Gram Address')

                    ->nullable()
                    //   'id', 'facebook', 'twitter', 'instagram', 'youtube', 'email', 'phone', 'created_at', 'updated_at', '', 'btc', 'usdt', 'skrill', 'net', 'wu', 'pm', 'mg'


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('facebook')->label('Facebook'),
                TextColumn::make('twitter')->label('Twitter'),
                TextColumn::make('instagram')->label('Instagram'),
                TextColumn::make('youtube')->label('YouTube'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('phone')->label('Phone'),
            ])
            ->filters([
                //
            ])->actions([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    // Tables\Actions\DeleteAction::make(),
                ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            // 'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
