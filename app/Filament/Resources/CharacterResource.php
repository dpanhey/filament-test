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
