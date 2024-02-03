<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BloodPotencyResource\Pages;
use App\Filament\Resources\BloodPotencyResource\RelationManagers;
use App\Models\BloodPotency;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BloodPotencyResource extends Resource
{
    protected static ?string $model = BloodPotency::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('level')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('blood_rise')
                    ->required(),
                Forms\Components\TextInput::make('power_bonus')
                    ->required(),
                Forms\Components\TextInput::make('feeding_penalty')
                    ->required(),
                Forms\Components\TextInput::make('damage_healed_per_turn')
                    ->required(),
                Forms\Components\TextInput::make('hunger_test')
                    ->required(),
                Forms\Components\TextInput::make('bane_score')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('blood_rise')
                    ->searchable(),
                Tables\Columns\TextColumn::make('power_bonus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('feeding_penalty')
                    ->searchable(),
                Tables\Columns\TextColumn::make('damage_healed_per_turn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hunger_test')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bane_score')
                    ->searchable(),
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
            'index' => Pages\ListBloodPotencies::route('/'),
            'create' => Pages\CreateBloodPotency::route('/create'),
            'edit' => Pages\EditBloodPotency::route('/{record}/edit'),
        ];
    }
}
