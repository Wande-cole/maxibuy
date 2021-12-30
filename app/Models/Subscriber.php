<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'endpoint'
    ];

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class);
    }
}
