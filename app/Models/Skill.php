<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['skill_type_id', 'name'])]

class Skill extends Model
{
    public function skillType(): BelongsTo
    {
        return $this->belongsTo(SkillType::class);
    }
}
