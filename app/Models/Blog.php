<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'interest',
        'blog_title',
        'blog_body',
    ];

    protected $dates = ['deleted_at'];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('blog_title', 'like', '%' . request('search') . '%');
        }
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
