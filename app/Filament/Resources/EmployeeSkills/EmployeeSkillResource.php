<?php

namespace App\Filament\Resources\EmployeeSkills;

use App\Filament\Resources\EmployeeSkills\Pages\CreateEmployeeSkill;
use App\Filament\Resources\EmployeeSkills\Pages\EditEmployeeSkill;
use App\Filament\Resources\EmployeeSkills\Pages\ListEmployeeSkills;
use App\Filament\Resources\EmployeeSkills\Schemas\EmployeeSkillForm;
use App\Filament\Resources\EmployeeSkills\Tables\EmployeeSkillsTable;
use App\Models\EmployeeSkill;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EmployeeSkillResource extends Resource
{
    protected static ?string $model = EmployeeSkill::class;
    
    protected static string|UnitEnum|null $navigationGroup = 'Skills';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'expiry_date';

    public static function form(Schema $schema): Schema
    {
        return EmployeeSkillForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmployeeSkillsTable::configure($table);
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
            'index' => ListEmployeeSkills::route('/'),
            'create' => CreateEmployeeSkill::route('/create'),
            'edit' => EditEmployeeSkill::route('/{record}/edit'),
        ];
    }
}
