<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomePageResource\Pages;
use App\Filament\Resources\HomePageResource\RelationManagers;
use App\Models\HomePage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;

class HomePageResource extends Resource
{
    protected static ?string $model = HomePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Meta Info')->schema([
                    TextInput::make('meta_title')->required(),
                    TextInput::make('meta_description')->required(),
                    FileUpload::make('meta_image')->image()->directory('homepage')->nullable(),
                ]),

                Section::make('Hero Section')->schema([
                    FileUpload::make('hero_image')->image()->directory('homepage')->nullable(),
                    TextInput::make('hero_title')->nullable(),
                    TextInput::make('hero_sub_title')->nullable(),
                ]),

                Section::make('Offer Section')->schema([
                    TextInput::make('offer_title')->nullable(),
                    FileUpload::make('offer_pics')
                        ->directory('homepage')
                        ->multiple()
                        ->image()
                        ->reorderable()
                        ->nullable(),
                    TextInput::make('offer_description')->nullable(),
                    Repeater::make('offer_bullets')
                        ->schema([
                            TextInput::make('text')->label('Bullet Point')->required(),
                        ])
                        ->defaultItems(1)
                        ->minItems(1)
                        ->reorderable()
                        ->nullable(),
                ]),

                Section::make('Visa Assistance')->schema([
                    Repeater::make('visa_assistance')
                        ->schema([
                            FileUpload::make('flag')->image()->directory('homepage')->required(),
                            TextInput::make('country')->required(),
                        ])
                        ->reorderable()
                        ->nullable(),
                ]),

                Section::make('Cards Section')->schema([
                    Repeater::make('cards')
                        ->schema([
                            FileUpload::make('picture')->directory('homepage')->image()->nullable(),
                            FileUpload::make('icon')->directory('homepage')->image()->nullable(),
                            TextInput::make('title')->required(),
                            Textarea::make('description')->nullable(),
                        ])
                        ->reorderable()
                        ->nullable(),
                ]),

                Section::make('Travel Section')->schema([
                    FileUpload::make('travel_pic')->image()->directory('homepage')->nullable(),
                    Repeater::make('travel_cards')
                        ->schema([
                            TextInput::make('icon')->nullable(),
                            TextInput::make('title')->required(),
                            Textarea::make('description')->nullable(),
                        ])
                        ->reorderable()
                        ->nullable(),
                ]),

                Section::make('CEO Letter')->schema([
                    FileUpload::make('ceo_pic')->image()->directory('homepage')->nullable(),
                    TextInput::make('letter_title')->nullable(),
                    RichEditor::make('letter')->nullable(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListHomePages::route('/'),
            'create' => Pages\CreateHomePage::route('/create'),
            'edit' => Pages\EditHomePage::route('/{record}/edit'),
        ];
    }
}
