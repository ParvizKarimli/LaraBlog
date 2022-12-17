<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if($filters['category'] ?? false)
        {
            return $query->where('category', '=', $filters['category']);
        }
    }
}
