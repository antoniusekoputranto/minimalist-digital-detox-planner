<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\DetoxPlan;
use App\Models\NotificationGuide;
use App\Models\OfflineActivity;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke DetoxPlan
     */
    public function detoxPlans()
    {
        return $this->hasMany(DetoxPlan::class);
    }

    /**
     * Relasi ke NotificationGuide
     */
    public function notificationGuides()
    {
        return $this->hasMany(NotificationGuide::class);
    }

    /**
     * Relasi ke OfflineActivity
     */
    public function offlineActivities()
    {
        return $this->hasMany(OfflineActivity::class);
    }
}
