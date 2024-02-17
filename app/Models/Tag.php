<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function ad()
    {
        return $this->belongsToMany(Ad::class, 'ad_tags');
    }
}
