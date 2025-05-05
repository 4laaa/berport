<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerAdsResource\Pages;
use App\Filament\Resources\BannerAdsResource\RelationManagers;
use App\Models\BannerAds;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BannerAdsResource extends Resource
{
    protected static ?string $model = BannerAds::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255)
                    ->activeUrl(),
                Forms\Components\Select::make('is_active')
                ->options([
                    '1' => 'active',
                    '0' => 'not_active',
                ])
                ->required(),
                Forms\Components\Select::make('type')
                ->options([
                    'banner' => 'banner',
                    'square' => 'square',
                ])
                ->required(),
                Forms\Components\FileUpload::make('thumbanail')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('link')
                ->searchable(),
                Tables\Columns\TextColumn::make('is_active')
                ->searchable(),
                Tables\Columns\TextColumn::make('type')
                ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
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
            'index' => Pages\ListBannerAds::route('/'),
            'create' => Pages\CreateBannerAds::route('/create'),
            'edit' => Pages\EditBannerAds::route('/{record}/edit'),
        ];
    }
}
