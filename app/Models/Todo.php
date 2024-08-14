<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'completed', 'user_id'];

    public function users()
    {
        $this->belongsTo(User::class);
    }

    public function getRemainingTime()
    {
        $createdAt = Carbon::parse($this->created_at);
        $expiresAt = $createdAt->addHours(24);
        $now = Carbon::now();

        $remainingMinutes = round(abs($expiresAt->diffInMinutes($now)));
        $remainingHours = round(abs($expiresAt->diffInHours($now)));

        if ($expiresAt->isPast()) {
            return 'Expired';
        } elseif ($remainingHours <= 1) {
            return $remainingMinutes . ' ' . ($remainingMinutes > 1 ? 'minutes' : 'minute');
        } else {
            return $remainingHours . ' hours';
        }
    }


}
