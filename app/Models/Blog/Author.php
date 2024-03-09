<?php

namespace App\Models\Blog;

use App\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'instagram',
        'twitter',
    ];
}
