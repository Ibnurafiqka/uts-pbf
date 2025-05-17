<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'isbn',
        'stock',
        'status',
        'description',
        'cover_image',
        'category_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke peminjaman (Loan)
    public function loans()
    {
        return $this->hasMany(Borrowing::class);
    }
}
