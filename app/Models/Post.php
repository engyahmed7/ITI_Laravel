<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    protected $fillable = [
        'title',
        'body',
        'enabled',
        'user_id',
        'published_at',
        'image',
    ];
}
