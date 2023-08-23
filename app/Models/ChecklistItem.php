<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Checklist;

class ChecklistItem extends Model
{
    use HasFactory;

    protected $table = 'checklist_items';

    protected $primaryKey = 'checklistItemId';

    protected $fillable = [
            'itemName',
            'checklistId',
    ];

    public function Checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class,'checklistId');
    }
}
