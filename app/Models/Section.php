<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    protected $fillable = ['name', 'university_id'];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }
}
