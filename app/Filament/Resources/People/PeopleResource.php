<?php

namespace App\Filament\Resources\People;

use App\Filament\Resources\People\Pages\CreatePeople;
use App\Filament\Resources\People\Pages\EditPeople;
use App\Filament\Resources\People\Pages\ListPeople;
use App\Filament\Resources\People\Schemas\PeopleForm;
use App\Filament\Resources\People\Tables\PeopleTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PeopleResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'People';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')->required(),
            TextInput::make('email')->email()->required(),
            TextInput::make('password')->password()->required(),
            TextInput::make('phone')->required(),
            Select::make('role_id')->label('Role')->required()->options([
                '1' => 'Admin',
                '2' => 'Supplier',
                '3' => 'Client'
            ]),
            TextInput::make('address')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('email')
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
            'index' => ListPeople::route('/'),
            'create' => CreatePeople::route('/create'),
            'edit' => EditPeople::route('/{record}/edit'),
        ];
    }
}
