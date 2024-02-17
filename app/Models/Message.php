<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        "application_id",
        "user_id",
        "text"
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
