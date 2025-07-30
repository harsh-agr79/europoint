<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourResource\Pages;
use App\Filament\Resources\TourResource\RelationManagers;
use App\Models\Tour;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\ {
    TextInput, Textarea, Select, FileUpload, RichEditor, DatePicker, MultiSelect, Toggle}
    ;
class TourResource extends Resource
{
    protected static ?string $model = Tour::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('meta_title')
                    ->required(),
                Forms\Components\TextInput::make('meta_description')
                    ->required(),
                Forms\Components\FileUpload::make('meta_image')
                    ->image(),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(Tour::class, 'slug', fn ($record) => $record),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->unique(Tour::class, 'title', fn ($record) => $record),
                Forms\Components\TextInput::make('location')
                    ->required(),
               
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->required(),
                Forms\Components\Textarea::make('description_short'),
                
                Forms\Components\Repeater::make('images')
                    ->label('Images')
                    ->createItemButtonLabel('Add Image')
                    ->minItems(1)
                    ->defaultItems(1)
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Upload Image')
                            ->image()
                            ->directory('images/tours')
                            ->imagePreviewHeight('150')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->required(),
                    ])
                    ->required(),

                Forms\Components\Repeater::make('highlights')
                    ->label('Trip Highlights')
                    ->createItemButtonLabel('Add Highlight')
                    ->minItems(1)
                    ->defaultItems(1)
                    ->schema([
                        Forms\Components\TextInput::make('highlight')
                            ->label('Highlight')
                            ->required(),
                    ])
                    ->required(),

                Forms\Components\Repeater::make('itinerary')
                    ->label('Itinerary')
                    ->createItemButtonLabel('Add Day')
                    ->minItems(1)
                    ->defaultItems(1)
                    ->schema([
                        Forms\Components\TextInput::make('day')
                            ->label('Day')
                            ->required(),
                        Forms\Components\Repeater::make('details')
                            ->label('Day Details')
                            ->createItemButtonLabel('Add Detail')
                            ->minItems(1)
                            ->defaultItems(1)
                            ->schema([
                                Forms\Components\Textarea::make('detail')
                                    ->label('Detail')
                                    ->required(),
                            ])
                            ->required(),
                    ])
                    ->required(),

                Forms\Components\Repeater::make('inclusions')
                    ->label('Inclusions')
                    ->createItemButtonLabel('Add Inclusion')
                    ->minItems(1)
                    ->defaultItems(1)
                    ->schema([
                        Forms\Components\TextInput::make('inclusion')
                            ->label('Inclusion')
                            ->required(),
                    ])
                    ->required(),

                Forms\Components\Repeater::make('exclusions')
                    ->label('Exclusions')
                    ->createItemButtonLabel('Add Exclusion')
                    ->minItems(1)
                    ->defaultItems(1)
                    ->schema([
                        Forms\Components\TextInput::make('exclusion')
                            ->label('Exclusion')
                            ->required(),
                    ])
                    ->required(),


                RichEditor::make( 'description_long' )
                ->toolbarButtons( [
                    'attachFiles',
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h1',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ] )->required()->columnSpanFull(),

                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('EUR', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),
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
            'index' => Pages\ListTours::route('/'),
            'create' => Pages\CreateTour::route('/create'),
            'edit' => Pages\EditTour::route('/{record}/edit'),
        ];
    }
}
