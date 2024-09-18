<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\HtmlString;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\RichEditor::make('text')
                    ->required()
                    ->columnSpanFull()

                    ->maxLength(65535),

                Forms\Components\FileUpload::make('photo')
                    ->disk('public')
                    ->directory('testimonials-photos')
                    ->image()
                    ->columnSpanFull()
                    ->required(),
                    
        Forms\Components\TextInput::make('video_url')
                 ->label('Video Url (Please use this format: https://www.youtube.com/watch?v=mkIGt29Oyps) ')
                    ->columnSpanFull()
                    ->required(),



                Forms\Components\Select::make('rating')
                    ->options([
                        1 => '1 Star',
                        2 => '2 Stars',
                        3 => '3 Stars',
                        4 => '4 Stars',
                        5 => '5 Stars',
                    ])
                    ->required()
                    ->columnSpanFull()
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User'),

                Tables\Columns\TextColumn::make('text')
                    ->limit(50),

             ImageColumn::make('photo')
                    ->disk('public')
                   ,

                   Tables\Columns\TextColumn::make('rating')
                   ->label('Rating')
                   ->html(fn($record) => new HtmlString(view('components.rating', ['rating' => $record->rating])->render())),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
