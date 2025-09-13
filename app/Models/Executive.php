<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Executive extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'executives';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'designation',
        'avatar',
        'bio',
        'education',
        'profession',
        'achievements',
        'status'
    ];

    protected $casts = [
        'achievements' => 'array',
        'status' => 'boolean'
    ];

    protected $attributes = [
        'status' => true,
        'avatar' => 'img/default-avatar.jpg'
    ];

    /**
     * Scope to get only active executives
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Get the achievements as a formatted list
     */
    public function getFormattedAchievementsAttribute()
    {
        if (is_array($this->achievements)) {
            return $this->achievements;
        }

        return [];
    }
}
