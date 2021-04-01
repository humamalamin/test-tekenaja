<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'author_id',
        'title',
        'description',
        'cover',
        'synopsis',
        'publication_year'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
