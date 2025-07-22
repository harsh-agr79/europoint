<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactPageResource\Pages;
use App\Filament\Resources\ContactPageResource\RelationManagers;
use App\Models\ContactPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ContactPageResource extends Resource
{
    protected static ?string $model = ContactPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = "Contact";

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->maxLength(255),
                TextInput::make('meta_description')
                    ->label('Meta Description'),
                FileUpload::make('meta_image')
                    ->label('Meta Image')
                    ->image()
                    ->directory('contact-meta-images')
                    ->nullable(),
                TextInput::make('location')
                    ->label('Location')
                    ->nullable(),
                Repeater::make('phone') // Array of phone numbers
                    ->label('Phone Numbers')
                    ->schema([
                        TextInput::make('number')
                            ->label('Phone Number')
                            ->required(),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->minItems(1)
                    ->maxItems(5),
                Repeater::make('email') // Array of email addresses
                    ->label('Email Addresses')
                    ->schema([  
                        TextInput::make('address')
                            ->label('Email Address')
                            ->email()
                            ->required(),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->minItems(1)
                    ->maxItems(5),
                Textarea::make('hours')
                    ->label('Opening Hours')
                    ->nullable(),
                TextInput::make('whatsapp_no')
                    ->label('WhatsApp Number')
                    ->nullable(),

                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('meta_title')->sortable(),
                TextColumn::make('location')->sortable(),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime(),
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

    public static function canCreate(): bool
    {
        return false; // Allow creation of contact pages
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactPages::route('/'),
            'create' => Pages\CreateContactPage::route('/create'),
            'edit' => Pages\EditContactPage::route('/{record}/edit'),
        ];
    }
}
