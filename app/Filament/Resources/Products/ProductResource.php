<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\Pages\CreateProduct;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\Pages\ListProducts;
use App\Filament\Resources\Products\Schemas\ProductForm;
use App\Filament\Resources\Products\Tables\ProductsTable;
use App\Models\Product;
use BackedEnum;
use Filament\Resources\Resource;
use App\Models\Category;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Product';

    public static function form(Schema $schema): Schema
    {
        function getCategories(){
            $categories = DB::table('categories')->select('id', 'title')->get();
            return $categories->mapWithKeys(function ($category){
                return [$category->id => $category->title];
            })->toArray();
        }

        return $schema->schema([
            TextInput::make('name')->label('Product Name')->required(),
            TextInput::make('description')->label('Product Description')->required(),
            TextInput::make('price')->numeric()->label('Product Price')->required(),
            TextInput::make('stock')->numeric()->label('Stock Quantity')->required(),
            Select::make('categorie_id')->label('Product Categorie')->required()->options(getCategories()),
            FileUpload::make('image')->label('Product Image')->required(),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('stock')
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
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
