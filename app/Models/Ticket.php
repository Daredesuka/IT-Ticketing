<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'title',
        'description',
        'status',
        'priority',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke TicketReply
    public function replies()
    {
        return $this->hasMany(TicketReply::class);
    }

    // Auto generate code saat create
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($ticket) {
            $ticket->code = 'TKT-' . date('Ymd') . '-' . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }
}