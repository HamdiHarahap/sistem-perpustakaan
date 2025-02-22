<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Testing\Fluent\Concerns\Has;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'books';

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
