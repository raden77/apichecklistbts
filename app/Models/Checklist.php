<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ChecklistItem;
class Checklist extends Model
{
    use HasFactory;

    protected $table = 'checklists';

    protected $primaryKey = 'checklistId';

    protected $fillable = [
            'name',
    ];

    public function checklist_items(): HasMany
    {
        return $this->hasMany(ChecklistItem::class,'checklistId');
    }

}
