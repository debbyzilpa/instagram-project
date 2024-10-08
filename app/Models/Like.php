<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'photo_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // jika ada atribut yang memerlukan casting
    ];

    /**
     * Definisikan hubungan antara Like dan User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Definisikan hubungan antara Like dan Photo (jika relevan).
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
