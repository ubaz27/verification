<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholarship_type',
        'title',
        'organisation',
        'date_posted',
        'deadline',
        'amount',
        'eligibility',
        'status',
        'posted_by',
        'description',
        'duration',
        'application_link'
    ];

    protected $dates = [
        'date_posted',
        'deadline'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date_posted' => 'datetime',
        'deadline' => 'datetime'
    ];

    // Relationship with User who posted the scholarship
    public function postedBy()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

    // Accessor to automatically determine status based on deadline
    public function getStatusAttribute($value)
    {
        if ($this->deadline < now()) {
            return 'expired';
        }
        return 'active';
    }

    // Scope for active scholarships
    public function scopeActive($query)
    {
        return $query->where('deadline', '>=', now());
    }

    // Scope for expired scholarships
    public function scopeExpired($query)
    {
        return $query->where('deadline', '<', now());
    }

    // Scope for filtering by scholarship type
    public function scopeByType($query, $type)
    {
        return $query->where('scholarship_type', $type);
    }

    // Accessor for formatted amount
    public function getFormattedAmountAttribute()
    {
        return '₦' . number_format((float)$this->amount, 2);
    }

    // Accessor for days remaining until deadline
    public function getDaysRemainingAttribute()
    {
        if ($this->deadline < now()) {
            return 0;
        }
        return now()->diffInDays($this->deadline);
    }
}
