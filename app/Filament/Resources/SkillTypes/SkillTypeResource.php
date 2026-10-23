<?php

namespace App\Filament\Resources\SkillTypes;

use App\Filament\Resources\SkillTypes\Pages\CreateSkillType;
use App\Filament\Resources\SkillTypes\Pages\EditSkillType;
use App\Filament\Resources\SkillTypes\Pages\ListSkillTypes;
use App\Filament\Resources\SkillTypes\Schemas\SkillTypeForm;
use App\Filament\Resources\SkillTypes\Tables\SkillTypesTable;
use App\Models\SkillType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SkillTypeResource extends Resource
{
    protected static ?string $model = SkillType::class;

    protected static string|UnitEnum|null $navigationGroup = 'Skills';


    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return SkillTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SkillTypesTable::configure($table);
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
            'index' => ListSkillTypes::route('/'),
            'create' => CreateSkillType::route('/create'),
            'edit' => EditSkillType::route('/{record}/edit'),
        ];
    }
}
