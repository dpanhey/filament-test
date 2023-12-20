<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CharacterResource\Pages;
use App\Filament\Resources\CharacterResource\RelationManagers;
use App\Models\Character;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Tabs;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CharacterResource extends Resource
{
    protected static ?string $model = Character::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('General Information')
                            ->schema([
                                Forms\Components\TextInput::make('character_name')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->required(),
                                Forms\Components\Select::make('experience_level_id')
                                    ->relationship('experienceLevel', 'name')
                                    ->required(),
                                Forms\Components\Select::make('character_type_id')
                                    ->relationship('characterType', 'name')
                                    ->required(),
                                Forms\Components\TextInput::make('total_ap')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ap_unused')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ap_used')
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->nullable(),
                                Forms\Components\Select::make('species_id')
                                    ->relationship('species', 'name')
                                    ->required(),
                                Forms\Components\Select::make('culture_id')
                                    ->relationship('culture', 'name')
                                    ->required(),
                                Forms\Components\Select::make('profession_id')
                                    ->relationship('profession', 'name')
                                    ->required(),
                                Forms\Components\Toggle::make('alive')
                                    ->default(true),
                            ])
                        ->columns(2),
                        Tabs\Tab::make('Personal Information')
                            ->schema([
                                Forms\Components\TextInput::make('family')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('place_of_birth')
                                    ->maxLength(100),
                                Forms\Components\DatePicker::make('date_of_birth'),
                                Forms\Components\TextInput::make('age')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sex')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('size')
                                    ->numeric(),
                                Forms\Components\TextInput::make('weight')
                                    ->numeric(),
                                Forms\Components\TextInput::make('hair_color')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('eye_color')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('title')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('social_status')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('characteristics')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('backstory')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('other_information')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),

                            ])
                        ->columns(2),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('character_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('species.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('culture.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('profession.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('experienceLevel.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('characterType.name')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->headerActions([
                Tables\Actions\Action::make('quickCreate')
                    ->form([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('character_name')
                            ->required(),
                        Forms\Components\Select::make('experience_level_id')
                            ->relationship('experienceLevel', 'name')
                            ->required(),
                        Forms\Components\Select::make('character_type_id')
                            ->relationship('characterType', 'name')
                            ->required(),])
                    ->icon('heroicon-o-plus')
                    ->action(function (array $data, string $model) {
                        return $model::create($data);
                    })]);
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
            'index' => Pages\ListCharacters::route('/'),
            'create' => Pages\CreateCharacter::route('/create'),
            'view' => Pages\ViewCharacter::route('/{record}'),
            'edit' => Pages\EditCharacter::route('/{record}/edit'),
        ];
    }
}
