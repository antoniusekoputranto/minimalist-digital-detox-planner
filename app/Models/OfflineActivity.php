<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetoxPlan;

class OfflineActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'detox_plan_id',
        'activity_name',
        'description',
        'is_completed',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    /**
     * Relasi ke DetoxPlan
     */
    public function detoxPlan()
    {
        return $this->belongsTo(DetoxPlan::class);
    }
}
