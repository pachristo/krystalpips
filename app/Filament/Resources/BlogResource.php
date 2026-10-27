<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
class BlogResource extends Resource
{

    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),


                    Textarea::make('description')
                    ->columnSpanFull()
                ->label('Summary')

                    ->required(),
                TextInput::make('meta_description')
                ->columnSpanFull()
                    ->nullable(),
                    Textarea::make('meta_keywords')
                ->columnSpanFull()
                    ->nullable(),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('uploads/content'),
                FileUpload::make('photo')
                    ->image()
                    ->columnSpanFull()
                    ->directory('uploads/photos')
                    ->nullable(),

                Forms\Components\Section::make('Author')
                    ->description('Shown on the public blog article page.')
                    ->schema([
                        TextInput::make('author')
                            ->label('Author name')
                            ->maxLength(120),
                        TextInput::make('author_role')
                            ->label('Author role / title')
                            ->placeholder('e.g. Market Analyst')
                            ->maxLength(120),
                        FileUpload::make('author_photo')
                            ->label('Author photo')
                            ->image()
                            ->avatar()
                            ->directory('uploads/authors')
                            ->nullable(),
                        Textarea::make('author_bio')
                            ->label('Author bio')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('author')->label('Author')->toggleable(),
                Tables\Columns\TextColumn::make('slug')->sortable(),
                ImageColumn::make('photo')
                ->size(100)
                ->extraImgAttributes(['loading' => 'lazy'])
                ->label('Photo'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
