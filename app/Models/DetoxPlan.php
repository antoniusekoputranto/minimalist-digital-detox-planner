<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OfflineActivity;

class DetoxPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_name',
        'start_date',
        'end_date',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Relasi ke model User (setiap DetoxPlan dimiliki oleh satu user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke OfflineActivity (satu DetoxPlan bisa punya banyak aktivitas offline)
     */
    public function offlineActivities()
    {
        return $this->hasMany(OfflineActivity::class);
    }
}
