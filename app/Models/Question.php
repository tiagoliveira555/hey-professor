<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    /** @return HasMany<Vote> */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function likes(): int
    {
        return $this->votes()->sum('like');
    }

    public function unlikes(): int
    {
        return $this->votes()->sum('unlike');
    }
}
