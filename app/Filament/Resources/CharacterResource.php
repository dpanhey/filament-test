<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CharacterResource\Pages;
use App\Filament\Resources\CharacterResource\RelationManagers;
use App\Models\Character;
use Faker\Provider\Text;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Infolist;
use Filament\Resources\Components\Tab;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\TextEntry;

class CharacterResource extends Resource
{
    protected static ?string $model = Character::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Persönliche Daten')
                    ->schema([
                        Forms\Components\TextInput::make('character_name')
                            ->required(),
                        Forms\Components\TextInput::make('family'),
                        Forms\Components\TextInput::make('place_of_birth'),
                        Forms\Components\TextInput::make('date_of_birth'),
                        Forms\Components\TextInput::make('sex'),
                        Forms\Components\TextInput::make('size')
                            ->numeric(),
                        Forms\Components\TextInput::make('age')
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
                            ])
                            ->columnspan(2),
                        Forms\Components\Textarea::make('characteristics')
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('backstory')
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('other_information')
                            ->columnSpanFull(),
                    ])
                    ->columns(4),
            ]);
    }

//    public static function getEloquentQuery(): Builder
//    {
//        return parent::getEloquentQuery()->withoutGlobalScopes();
//    }

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
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes());
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Group::make()
                    ->relationship('attributes')
                    ->columnSpanFull()
                    ->schema([
                        Infolists\Components\Fieldset::make('Basis Attribute')
                            ->schema([
                                Infolists\Components\Fieldset::make('MU')
                                    ->schema([
                                        Infolists\Components\TextEntry::make('courage')
                                            ->label('')
                                            ->color('danger')
                                            ->weight(FontWeight::ExtraBold)
                                            ->size(TextEntry\TextEntrySize::Large),
                                    ])->columnSpan(1),
                                Infolists\Components\TextEntry::make('sagacity'),
                                Infolists\Components\TextEntry::make('intuition'),
                                Infolists\Components\TextEntry::make('charisma'),
                                Infolists\Components\TextEntry::make('dexterity'),
                                Infolists\Components\TextEntry::make('agility'),
                                Infolists\Components\TextEntry::make('constitution'),
                                Infolists\Components\TextEntry::make('strength')
                            ])
                            ->columns(8)
                    ]),
                Infolists\Components\Fieldset::make('Persönliche Daten')
                    ->schema([
                        Infolists\Components\TextEntry::make('character_name'),
                        Infolists\Components\TextEntry::make('family'),
                        Infolists\Components\TextEntry::make('place_of_birth'),
                        Infolists\Components\TextEntry::make('date_of_birth'),
                        Infolists\Components\TextEntry::make('sex'),
                        Infolists\Components\TextEntry::make('size'),
                        Infolists\Components\TextEntry::make('age'),
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
                Infolists\Components\Fieldset::make('Vorteile') ## Nutzbares Layout für Zauber etc.
                ->schema([
                    Infolists\Components\RepeatableEntry::make('advantagecharacters')
                        ->label('')
                        ->schema([
                            Infolists\Components\TextEntry::make('advantage.name')
                                ->label('')
                        ])
                        ->contained(false)
                        ->grid(2)
                        ->columnSpanFull()
                ])
                    ->columnSpan(1),
                Infolists\Components\Fieldset::make('Nachteile') ## Standardlayout für Vorteile/Nachteile/Sonderfertigkeiten/Zaubertricks/Segen...
                ->schema([
                    Infolists\Components\Group::make()
                        ->relationship('characterDisadvantages')
                        ->schema([
                            Infolists\Components\TextEntry::make('disadvantage.name')
                                ->label('')
                        ])
                        ->columnSpanFull(),
                ])->columnSpan(1),
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
            'edit-meta' => Pages\EditCharacterMeta::route('/{record}/edit/metadata'),
            'edit' => Pages\EditCharacter::route('/{record}/edit'),
            'edit-skills' => Pages\EditCharacterSkills::route('/{record}/edit/skills'),
            'edit-attributes' => Pages\EditCharacterAttributes::route('/{record}/edit/attributes'),
            'edit-advantages' => Pages\EditCharacterAdvantages::route('/{record}/edit/advantages'),
            'view' => Pages\ViewCharacter::route('/{record}'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ListCharacters::class,
            Pages\ViewCharacter::class,
            Pages\EditCharacterMeta::class,
            Pages\EditCharacter::class,
            Pages\EditCharacterAttributes::class,
            Pages\EditCharacterSkills::class,
            Pages\EditCharacterAdvantages::class,
        ]);
    }
}
