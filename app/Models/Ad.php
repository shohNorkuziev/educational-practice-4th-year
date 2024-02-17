<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "contractor_id",
        "title",
        "text",
        "from",
        "until"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function constractor()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->hasMany(Application::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'ad_tags')->withTimestamps();
    }
}

