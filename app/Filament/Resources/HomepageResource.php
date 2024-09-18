<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageResource\Pages;
use App\Filament\Resources\HomepageResource\RelationManagers;
use App\Models\Homepage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomepageResource extends Resource
{
    protected static ?string $model = Homepage::class;
    protected static ?string $navigationGroup = 'Seo Content';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->columnSpan(2)
                    ->nullable(),
                Forms\Components\Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->columnSpan(2)
                    ->nullable(),
                Forms\Components\Textarea::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->columnSpan(2)
                    ->nullable(),
                    Forms\Components\Textarea::make('about')
                    ->label('About Us')
                    ->columnSpan(2)
                    ->nullable(),
                Forms\Components\Textarea::make('head1')
                    ->label('Head 1')
                    ->nullable(),
                Forms\Components\Textarea::make('head2')
                    ->label('Head 2')
                    ->nullable(),

                    Forms\Components\FileUpload::make('about_photo')
                    ->image()
                    ->columnSpanFull()
                    ->directory('uploads/photo')
                    ->nullable(),
                    Forms\Components\TextInput::make(name: 'about_video')
                    ->label('About us Youtube video Link')
                    ->required()
                    ->columnSpan(2)
                    ->nullable(),
                Forms\Components\Textarea::make('signals')
                    ->label('Signals')
                    ->columnSpan(2)
                    ->nullable(),
                Forms\Components\Textarea::make('investment')
                    ->label('Investment')
                    ->nullable(),
                Forms\Components\Textarea::make('community_support')
                    ->label('Community Support')
                    ->nullable(),
                Forms\Components\Textarea::make('mentorship')
                    ->label('Mentorship')
                    ->nullable(),
                Forms\Components\Textarea::make('proven_strategy')
                    ->label('Proven Strategy')
                    ->nullable(),
                Forms\Components\Textarea::make('commitment')
                    ->label('Commitment')
                    ->nullable(),
                Forms\Components\Textarea::make('trading_tools')
                    ->label('Trading Tools')
                    ->nullable(),


// 'plan_signal', 'plan_mentor', 'plan_investment', 'plan_courses'

                    Forms\Components\RichEditor::make('plan_signal')
                    ->label('Forex Signals')
                    ->columnSpan(2)
                    ->nullable(),
                Forms\Components\RichEditor::make('plan_mentor')
                    ->label('Mentorship Plan ')
                    ->columnSpan(2)
                    ->nullable(),
                Forms\Components\RichEditor::make('plan_investment')
                    ->label('Invetment Program')
                    ->columnSpan(2)
                    ->nullable(),
                Forms\Components\RichEditor::make('plan_courses')
                    ->label('Account Management ')
                    ->columnSpan(2)
                    ->nullable(),

                    Forms\Components\RichEditor::make('footer')
                    ->label('Footer Content ')
                    ->columnSpan(2)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->label('Meta Description')
                    ->limit(50),
                Tables\Columns\TextColumn::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->limit(50),
                // Add more columns if needed
            ])
            ->filters([
                // Add table filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListHomepages::route('/'),
            // 'create' => Pages\CreateHomepage::route('/create'),
            'edit' => Pages\EditHomepage::route('/{record}/edit'),
        ];
    }
}
