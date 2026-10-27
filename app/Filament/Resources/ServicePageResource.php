<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicePageResource\Pages;
use App\Models\ServicePage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServicePageResource extends Resource
{
    protected static ?string $model = ServicePage::class;

    protected static ?string $navigationGroup = 'Seo Content';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Service Pages';

    protected static ?string $modelLabel = 'Service page';

    protected static ?string $pluralModelLabel = 'Service pages';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Page')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Admin label')
                            ->required()
                            ->maxLength(120),
                        Forms\Components\TextInput::make('key')
                            ->label('URL key')
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Maps to the public URL, e.g. /signals'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('SEO title')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta description')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('meta_keywords')
                            ->label('Meta keywords')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Hero')
                    ->description('Matches the homepage banner style.')
                    ->schema([
                        Forms\Components\Textarea::make('head1')
                            ->label('Headline')
                            ->rows(2)
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('head2')
                            ->label('Supporting text')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('cta_label')
                            ->label('CTA button label')
                            ->default('Get started')
                            ->maxLength(60),
                        Forms\Components\TextInput::make('packages_heading')
                            ->label('Packages section heading')
                            ->default('Choose a package')
                            ->maxLength(120),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Body content')
                    ->schema([
                        Forms\Components\RichEditor::make('intro')
                            ->label('Intro (above packages)')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('footer_content')
                            ->label('Footer / SEO content (below packages)')
                            ->helperText('Shown before the site footer. Use this for long-form SEO copy.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Page')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('key')
                    ->label('URL')
                    ->formatStateUsing(fn ($state) => '/'.$state)
                    ->url(fn (ServicePage $record) => url('/'.$record->key))
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('title')
                    ->label('SEO title')
                    ->limit(40)
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServicePages::route('/'),
            'edit' => Pages\EditServicePage::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
