<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CharacterResource\Pages;
use App\Filament\Resources\CharacterResource\RelationManagers;
use App\Models\Character;
use Faker\Provider\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CharacterResource extends Resource
{
    protected static ?string $model = Character::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->relationship('attributes')
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\Fieldset::make('Basis Attribute')
                            ->schema([
                                Forms\Components\TextInput::make('courage')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sagacity')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('intuition')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('charisma')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('dexterity')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('agility')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('constitution')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('strength')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->columns(8),
                    ]),
                Forms\Components\Fieldset::make('Meta-Daten')
                    ->schema([
                        Forms\Components\Select::make('character_type_id')
                            ->relationship('characterType', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                            ]),
                        Forms\Components\Select::make('experience_level_id')
                            ->relationship('experienceLevel', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('adventure_points')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('maximum_attribute_value')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('maximum_skill_value')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('maximum_combat_technique_value')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('maximum_attribute_points')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('total_number_spells_rituals')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('number_foreign_spells')
                                    ->required()
                                    ->numeric(),
                            ]),
                        Forms\Components\TextInput::make('total_ap')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('ap_unused')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('ap_used')
                            ->required()
                            ->numeric(),
                        Forms\Components\Toggle::make('alive')
                            ->required(),
                    ])
                ->columns(3),
                Forms\Components\Fieldset::make('Persönliche Daten')
                    ->schema([
                        Forms\Components\TextInput::make('character_name'),
                        Forms\Components\TextInput::make('family'),
                        Forms\Components\TextInput::make('place_of_birth'),
                        Forms\Components\TextInput::make('date_of_birth'),
                        Forms\Components\TextInput::make('sex'),
                        Forms\Components\TextInput::make('size')
                            ->numeric(),
                        Forms\Components\TextInput::make('age')
                            ->numeric(),
                        Forms\Components\TextInput::make('height')
                            ->numeric(),
                        Forms\Components\TextInput::make('weight')
                            ->numeric(),
                        Forms\Components\TextInput::make('hair_color'),
                        Forms\Components\TextInput::make('eye_color'),
                        Forms\Components\TextInput::make('title'),
                        Forms\Components\TextInput::make('social_status'),
                        Forms\Components\Select::make('species_id')
                            ->relationship('species', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('ap_value')
                                    ->required()
                                    ->numeric(),
                            ]),
                        Forms\Components\Select::make('culture_id')
                            ->relationship('culture', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('ap_value')
                                    ->required()
                                    ->numeric(),
                            ]),
                        Forms\Components\Select::make('profession_id')
                            ->relationship('profession', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\Select::make('profession_group_id')
                                    ->relationship('professionGroup', 'name')
                                    ->required()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                    ]),
                            ]),
                        Forms\Components\Textarea::make('characteristics')
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('backstory')
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('other_information')
                            ->columnSpanFull(),
                    ])
                    ->columns(4),
                Forms\Components\Group::make()
                    ->relationship('attributes')
                    ->schema([
                        Forms\Components\Fieldset::make('Basis Werte')
                            ->schema([
                                Forms\Components\TextInput::make('life_points')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('arcane_energy')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('karma_points')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('spirit')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('toughness')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('dodge')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('initiative')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('movement')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('fate_points')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('carrying_capacity')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->columns(4)
                    ])
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('advantagecharacters')
                    ->relationship('advantagecharacters')
                    ->schema([
                        Forms\Components\Select::make('advantage_id')
                            ->relationship('advantage', 'name')
                            ->required(),
                    ])
                    ->columnStart(0)
                    ->columnSpan(1),
                Forms\Components\Repeater::make('characterdisadvantages')
                    ->relationship('characterdisadvantages')
                    ->schema([
                        Forms\Components\Select::make('disadvantage_id')
                            ->relationship('disadvantage', 'name')
                            ->required(),
                    ])
                    ->columnStart(0)
                    ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('character_name'),
                Tables\Columns\TextColumn::make('profession.name'),
                Tables\Columns\TextColumn::make('species.name'),
                Tables\Columns\TextColumn::make('culture.name'),
                Tables\Columns\TextColumn::make('characterType.name')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Fieldset::make('Persönliche Daten')
                    ->schema([
                        Infolists\Components\TextEntry::make('character_name'),
                        Infolists\Components\TextEntry::make('family'),
                        Infolists\Components\TextEntry::make('place_of_birth'),
                        Infolists\Components\TextEntry::make('date_of_birth'),
                        Infolists\Components\TextEntry::make('sex'),
                        Infolists\Components\TextEntry::make('size'),
                        Infolists\Components\TextEntry::make('age'),
                        Infolists\Components\TextEntry::make('height'),
                        Infolists\Components\TextEntry::make('weight'),
                        Infolists\Components\TextEntry::make('hair_color'),
                        Infolists\Components\TextEntry::make('eye_color'),
                        Infolists\Components\TextEntry::make('title'),
                        Infolists\Components\TextEntry::make('social_status'),
                        Infolists\Components\TextEntry::make('species.name')
                            ->label('Species'),
                        Infolists\Components\TextEntry::make('culture.name')
                            ->label('Culture'),
                        Infolists\Components\TextEntry::make('profession.name')
                            ->label('Profession'),
                        Infolists\Components\TextEntry::make('characteristics')
                            ->columnSpan(2),
                        Infolists\Components\TextEntry::make('backstory')
                            ->columnSpan(2),
                        Infolists\Components\TextEntry::make('other_information')
                            ->columnSpanFull(),
                    ])
                    ->columns(4),
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
            'index' => Pages\ListCharacters::route('/'),
            'create' => Pages\CreateCharacter::route('/create'),
            'edit' => Pages\EditCharacter::route('/{record}/edit'),
            'view' => Pages\ViewCharacter::route('/{record}'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ListCharacters::class,
            Pages\ViewCharacter::class,
            Pages\EditCharacter::class,
        ]);
    }
}
