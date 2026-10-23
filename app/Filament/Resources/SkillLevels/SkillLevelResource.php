<?php

namespace App\Filament\Resources\SkillLevels;

use App\Filament\Resources\SkillLevels\Pages\CreateSkillLevel;
use App\Filament\Resources\SkillLevels\Pages\EditSkillLevel;
use App\Filament\Resources\SkillLevels\Pages\ListSkillLevels;
use App\Filament\Resources\SkillLevels\Schemas\SkillLevelForm;
use App\Filament\Resources\SkillLevels\Tables\SkillLevelsTable;
use App\Models\SkillLevel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SkillLevelResource extends Resource
{
    protected static ?string $model = SkillLevel::class;

    protected static string|UnitEnum|null $navigationGroup = 'Skills';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return SkillLevelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SkillLevelsTable::configure($table);
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
            'index' => ListSkillLevels::route('/'),
            'create' => CreateSkillLevel::route('/create'),
            'edit' => EditSkillLevel::route('/{record}/edit'),
        ];
    }
}
