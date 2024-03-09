<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\AuthorResource\Pages;
use App\Filament\Resources\Blog\AuthorResource\RelationManagers;
use App\Models\Blog\Author;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('Nama')
                        ->suffixIcon('carbon-user'),
                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->email()
                        ->unique()
                        ->label('Email')
                        ->suffixIcon('carbon-email'),
                    Forms\Components\TextInput::make('phone')
                        ->required(),
                    Forms\Components\TextInput::make('instagram')
                        ->required()
                        ->suffixIcon('carbon-logo-instagram'),
                    Forms\Components\TextInput::make('twitter')
                        ->required()
                        ->suffixIcon('carbon-logo-twitter'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('instagram'),
                Tables\Columns\TextColumn::make('twitter'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalWidth('md'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAuthors::route('/'),
        ];
    }
}
